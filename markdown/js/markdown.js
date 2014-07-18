/*! markdown top directory */

var Directory = {
    id: 0,
    init: function (li) {
        var level = $(li).attr("_list_level");

        if ( $(li).next().attr("_list_level") <= level) {
            return false;
        }

        var id = "_directory_fold_" + Directory.id++;
        var button = "<a class='fold_button' href='#' id='" + id + "'>收起</a>";

        $(li).append(button);

        $("#" + id).click(function () {
            var li = $(this).parent("li");
            Directory.show(li);
            return false;
        });

        Directory.show(li);
    },
    show: function (li) {
        var level = $(li).attr("_list_level");
        var stats = $(li).find("a.fold_button").html();

        var hide = $(li).find("a.fold_button").html() == "展开" ? true : false;
        $(li).find("a.fold_button").html(hide ? "收起" : "展开");

        var goon = true;

        $(li).nextAll().each(function (_i, l) {
            var ll = $(l).attr("_list_level");

            if (goon && ll > level) {
                if (hide) {
                    $(l).show();

                } else {
                    $(l).hide();
                }

            } else {
                goon = false;
            }
        });
    },
    fold: function (level) {
        $("ul#top_directory").find("li").each(function (_k, li) {
            if (level == parseInt($(li).attr("_list_level"))) {
                Directory.init(li);
            }
        });
    },
}


$(function () {
    var level = directory_fold_level ? directory_fold_level : 2;
    Directory.fold(level);
});
