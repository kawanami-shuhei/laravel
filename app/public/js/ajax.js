$('#search-form').on('click', function () {
    $('.search-table tbody').empty(); //もともとある要素を空にする
    $('.search-null').remove(); //検索結果が0のときのテキストを消す

    let name = $('#name').val(); //検索ワードを取得
    let department = $('#department').val(); //検索ワードを取得
    let client = $('#client').val(); //検索ワードを取得
    
    if (!name && !department && !client) {
        return false;
    } //ガード節で検索ワードが空の時、ここで処理を止めて何もビューに出さない

    $.ajax({
        type: 'GET',
        url: '/search/index/', //後述するweb.phpのURLと同じ形にする
        data: {
            'name': name,
            'department': department,
            'client': client, //ここはサーバーに贈りたい情報。今回は検索ファームのバリューを送りたい。
        },
        dataType: 'json', //json形式で受け取る

        beforeSend: function () {
            $('.loading').removeClass('display-none');
        } //通信中の処理をここで記載。今回はぐるぐるさせるためにcssでスタイルを消す。
    
     //以下は後述
    }).done(function (data) { //ajaxが成功したときの処理
        $('.loading').addClass('display-none'); //通信中のぐるぐるを消す
        let html = '';
        $.each(data, function (index, value) { //dataの中身からvalueを取り出す
            let id = value.post_id;
            let name = value.name;
            let title = value.title;
            let department = value.department;
            let client = value.client;
            // １ユーザー情報のビューテンプレートを作成
            html += `
                        <tr class="user-list border border-dark">
                            <td class="col-xs-3">${name}</td>
                            <td class="col-xs-2">${title}</td>
                            <td class="col-xs-2">${department}</td>
                            <td class="col-xs-2">${client}</td>
                            <td class="col-xs-5"><a class="btn btn-info" href="/posts/${id}">詳細</a></td>
                        </tr>
                            `
        })
        $('.search-table tbody').append(html); //できあがったテンプレートをビューに追加
            // 検索結果がなかったときの処理
        if (data.length === 0) {
            $('.search-wrapper').after('<p class="text-center mt-5 search-null">ユーザーが見つかりません</p>');
        }

    }).fail(function () {
            //ajax通信がエラーのときの処理
        console.log('どんまい！');
    })
});
