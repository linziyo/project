$.regionLocation = function (options) {
    var config = {
        province: "#province",
        city: "#city",
        district: "#district",
        town: "#town",
        village: "#village",
        url: options.url
    }

    $(config.province).change(function () {
        $(config.city).empty();
        bindChildren($(this).val(), $(this).val() == "" ? config.province : config.city);
    });

    $(config.city).change(function () {
        $(config.district).empty();
        bindChildren($(this).val(), config.district);
    });

    $(config.district).change(function () {
        $(config.town).empty();
        bindChildren($(this).val(), config.town);
    });

    $(config.town).change(function () {
        $(config.village).empty();
        bindChildren($(this).val(), config.village);
    });

    $(config.village).change(function () {
    });

    function bindChildren(code, children) {
        var url = config.url + "/" + code;
        // alert(url);
        $.get(url, function (data) {
            $.each(data, function (i, value) {
                $(children).append("<option value='" + value.code + "'>" + value.name + "</option>");
            });
            $(children).trigger('change');
        });
    }

    bindChildren('', config.province);
}