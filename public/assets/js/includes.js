/**
 * Lightweight HTML Partials / Includes Engine
 * /assets/js/includes.js
 */
async function loadIncludes() {
   const elements = Array.from(document.querySelectorAll('[data-include]'))
      .filter(el => !el.hasAttribute('data-included'));

   if (elements.length === 0) {
      window.dispatchEvent(new CustomEvent('partials:loaded'));
      return;
   }

   await Promise.all(elements.map(async (el) => {
      const file = el.getAttribute('data-include');
      if (!file) return;

      el.setAttribute('data-included', 'true');
      try {
         const res = await fetch(file);
         if (!res.ok) throw new Error(`HTTP ${res.status}: Failed to fetch ${file}`);
         const html = await res.text();
         el.innerHTML = html;

         // Re-run any scripts embedded inside the partial
         const scripts = el.querySelectorAll('script');
         scripts.forEach(oldScript => {
            const newScript = document.createElement('script');
            Array.from(oldScript.attributes).forEach(attr => newScript.setAttribute(attr.name, attr.value));
            newScript.textContent = oldScript.textContent;
            oldScript.parentNode.replaceChild(newScript, oldScript);
         });
      } catch (err) {
         console.error(`[Includes] Error loading ${file}:`, err);
         el.innerHTML = `<div class="alert alert-warning py-2 my-1"><small>Komponen <code>${file}</code> gagal dimuat.</small></div>`;
      }
   }));

   // Support nested/recursive includes
   await loadIncludes();
}

document.addEventListener('DOMContentLoaded', loadIncludes);
