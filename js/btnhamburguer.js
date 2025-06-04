document.addEventListener('DOMContentLoaded', function () {
  const toggle = document.getElementById('menu-toggle');
  const closeBtn = document.getElementById('advanced-menu-hide');
  const menu = document.getElementById('mobile-advanced');

  if (toggle && menu) {
    toggle.addEventListener('click', function () {
      menu.classList.toggle('open');
    });
  }

  if (closeBtn) {
    closeBtn.addEventListener('click', function () {
      menu.classList.remove('open');
    });
  }
});
