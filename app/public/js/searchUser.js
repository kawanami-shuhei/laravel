$('#search-user').on('click', function () {
    $('.search-user-table tbody').empty(); //もともとある要素を空にする
    $('.search-null').remove(); //検索結果が0のときのテキストを消す

    let name = $('#name').val(); //検索ワードを取得
    let department = $('#department').val(); //検索ワードを取得
    let number = $('#number').val(); //検索ワードを取得
    
    if (!name && !department && !number) {
        return false;
    } //ガード節で検索ワードが空の時、ここで処理を止めて何もビューに出さない

    $.ajax({
        type: 'GET',
        url: '/search/user', //後述するweb.phpのURLと同じ形にする
        data: {
            'name': name,
            'department': department,
            'number': number, //ここはサーバーに贈りたい情報。今回は検索ファームのバリューを送りたい。
        },
        dataType: 'json', //json形式で受け取る

        beforeSend: function () {
            $('.loading').removeClass('display-none');
        } //通信中の処理をここで記載。今回はぐるぐるさせるためにcssでスタイルを消す。
    
    }).done(function (data) { //ajaxが成功したときの処理
        $('.loading').addClass('display-none'); //通信中のぐるぐるを消す
        let html = '';
        $.each(data, function (index, value) { //dataの中身からvalueを取り出す

            let id = value.id;
            let name = value.name;
            let department = value.department;
            let number = value.number;
            // １ユーザー情報のビューテンプレートを作成
            html += `
                        <tr class="user-list">
                            <td class="col-xs-2">${number}</td>
                            <td class="col-xs-3">${name}</td>
                            <td class="col-xs-2">${department}</td>
                            <td class="col-xs-5"><a class="btn btn-info" href="/user/${id}/edit">編集</a></td>
                            <td class="col-xs-5"><a class="btn btn-info" href="/user/${id}/delete" onClick="return confirm('削除しますか？');">削除</a></td>
                        </tr>
                            `
        })
        $('.search-user-table tbody').append(html); //できあがったテンプレートをビューに追加
        // 検索結果がなかったときの処理
        if (data.length === 0) {
            $('.search-wrapper').after('<p class="text-center mt-5 search-null">ユーザーが見つかりません</p>');
        }
       

    }).fail(function () {
        //ajax通信がエラーのときの処理
        console.log('どんまい！');
    })
});