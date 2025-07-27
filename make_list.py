// JavaScript پیشنهادی برای gallery
fetch('./list.json') // مطمئن شو فایل list.json کنار این فایل هست
  .then(r => r.json())
  .then(images => {
    const container = document.getElementById('gallery');
    if (!Array.isArray(images) || !images.length) {
      // اگر لیست عکس خالیه، هیچ کاری نکن
      return;
    }
    images.forEach(img => {
      const el = document.createElement('img');
      el.src = encodeURI(img);  // اگر نیاز بود encodeURIComponent(img)
      el.alt = "Artwork";
      el.onerror = () => { el.src = "noimg.png"; } // عکس جایگزین اگر نبود
      container.appendChild(el);
    });
  })
  .catch(() => {
    // اگر خطایی بود (فایل نبود یا مشکل داشت)، هیچ متنی نمایش داده نشه
  });
