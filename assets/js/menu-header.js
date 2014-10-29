(function () {
    if (/Microsoft/.test(navigator.appName)) { return }

    window.onload = function () {
      var menu = document.getElementById('menu-header');
      var init = menu.offsetTop;
      var docked;

      window.onscroll = function () {
        if (!docked && (menu.offsetTop - scrollTop() < 0)) {
          menu.className = 'menu-top';
          //menu.className = 'docked';
          docked = true;
        } else if (docked && scrollTop() <= init) {
          menu.className = 'menu-top';

          //menu.className = menu.className.replace('docked', '');
          docked = false;
        }
      };
    };

    function scrollTop() {
      return document.body.scrollTop || document.documentElement.scrollTop;
    }
  })();