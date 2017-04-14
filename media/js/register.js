
$('[data-url="file2"]').die('change').live('change', function (e) {
    var $this = $(this),
        data = $this.data(),
        val = $this.val(),
        file = this.files[0],
        img = document.createElement("img"),
        reader = new FileReader();
    reader.onloadend = function () {
        img.src = reader.result;
    };
    reader.readAsDataURL(file);
    $(img).addClass('img-polaroid').css({
        'max-height': '100%',
        'width': data.width
    });
    img.onerror = function () {
        // image not found or change src like this as default image:
        img.src = base_url + 'media/images/select-picture.png';
       // showMessage(lang('Error'), lang('Not supported file format'));
        console.log('Not supported file format');
        return;
    };
    $(data.rel).html(img);
});