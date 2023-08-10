let DataTableFormatClass = function() {
    let that = this;
    that.factory = function (item) {
        if (!!item.link) {
            return new DataTableFormatLinkClass(item)
        }
        return null;
    };
};
let DataTableFormatLinkClass = function (item) {
    let that = this;
    that.item = item;

    that.render = function (data, type, row) {
        let url = that.item.link.replace('===value===', data);
        return "<a href='" + url + "'>" + data + "</a>";
    };
};
let DataTableFormat = new DataTableFormatClass();

$(document).ready(function(){
    $('.dataTable').each(function () {
        let tableBox = $(this);
        let url = tableBox.attr('data-table-config');
        if (!url) {
            return;
        }

        $.get(url, function (data) {
            data.initComplete = function () {
                var api = this.api();
                api.on('order', function (e, settings, ordArr) {
                    let url = data.ajax
                        + '&order-num=' + ordArr[0]['col']
                        + '&sort=' + ordArr[0]['dir'];
                    //TODO:: избавится от проверки. ибо после перезагрузке идёт сортировка
                    if (url !== api.ajax.url()) {
                        api.ajax.url(url).load();
                    }
                });
            };
            data.columns.map(function(item) {
                let format = DataTableFormat.factory(item);
                item.render = format ? format.render : null;

                return item;
            })
            tableBox.DataTable(data);
        });
    });
});