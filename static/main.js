const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const mod = urlParams.get('mod');

$('form.ajax').on('submit', function (event) {
  event.preventDefault();
  var that = $(this),
      url = that.attr('action'),
      type = that.attr('method'),
      data = {};
    
  that.find('[name]').each(function(index,value) {
    var that = $(this),
        name = that.attr('name');
        value = that.val();

        data[name] = value;
  });
  $.ajax({
      url: url,
      type: type,
      data: data,
      success: function(){
        window.location.replace("index.php?mod="+ mod);
      }
  });
});