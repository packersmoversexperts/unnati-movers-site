document.addEventListener('DOMContentLoaded', () => {
  const modal = document.createElement('div');
  modal.className = 'modal'; modal.id = 'quoteModal';
  modal.innerHTML = document.querySelector('#quoteTemplate').innerHTML;
  document.body.appendChild(modal);

  const openers = [document.getElementById('openQuote'), document.getElementById('openQuoteTop')].filter(Boolean);
  openers.forEach(btn => btn.addEventListener('click', e => { e.preventDefault(); modal.style.display='flex'; }));

  document.body.addEventListener('click', e => {
    if (e.target.classList.contains('closeModal') || e.target.id==='quoteModal') modal.style.display='none';
  });

  const form = modal.querySelector('form');
  form.addEventListener('submit', async (e)=>{
    e.preventDefault();
    const data = Object.fromEntries(new FormData(form).entries());
    try{
      const r = await fetch('/api/lead_capture.php',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify(data)});
      if(r.ok){ alert('✅ Thank you! Our team will contact you shortly.'); modal.style.display='none'; form.reset(); }
      else alert('Something went wrong. Please call us at +91 9660772299.');
    }catch(err){ alert('Network error. Please try again.'); }
  });
});
