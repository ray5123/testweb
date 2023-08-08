var adventure_trekking_camp_Keyboard_loop = function (elem) {
  var adventure_trekking_camp_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');
  var adventure_trekking_camp_firstTabbable = adventure_trekking_camp_tabbable.first();
  var adventure_trekking_camp_lastTabbable = adventure_trekking_camp_tabbable.last();
  adventure_trekking_camp_firstTabbable.focus();

  adventure_trekking_camp_lastTabbable.on('keydown', function (e) {
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      adventure_trekking_camp_firstTabbable.focus();
    }
  });

  adventure_trekking_camp_firstTabbable.on('keydown', function (e) {
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      adventure_trekking_camp_lastTabbable.focus();
    }
  });

  elem.on('keyup', function (e) {
    if (e.keyCode === 27) {
      elem.hide();
    };
  });
};