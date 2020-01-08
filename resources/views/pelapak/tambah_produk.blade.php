<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>

<body>

    <form>
        {{-- {{ csrf_field() }} --}}
        <div>
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk">
        </div>
        <div>
            <label>Satuan</label>
            <input type="text" name="satuan" id="satuan">
        </div>
        <div>
            <label>Berat</label>
            <input type="number" name="berat" id="berat">
        </div>
        <div>
            <label>Harga Modal</label>
            <input type="number" name="harga_modal" id="harga_modal">
        </div>
        <div>
            <label>Harga Jual</label>
            <input type="number" name="harga_jual" id="harga_jual">
        </div>
        <div>
            <label>Diskon</label>
            <input type="number" name="diskon" id="diskon">
        </div>
        <div>
            <label>Stok</label>
            <input type="number" name="stok" id="stok">
        </div>
        <div>
            <label>Deskripsi/Keterangan</label>
            <textarea name="keterangan" id="keterangan" cols="30" rows="10"></textarea>
        </div>
        <div>
            <label>Tipe Produk</label>
            <select name="tipe_produk" id="tipe_produk">
                <option value="single">Single</option>
                <option value="varian">Varian</option>
            </select>
        </div>
        <div id="variasi">

        </div>
        <div>
            <input type="submit" value="Tambah" name="tambah" id="tambah">
        </div>
    </form>

    <script src="{{ asset ("/assets/jquery/jquery.min.js") }}"></script>
    <script>
        $(function() {
            // $.get("http://localhost:8000/api/produk/", {}, (response) => {
            //     console.log(response);
            // })
            $("#tipe_produk").on('change', function() {
                if ($(this).val() == 'varian') {
                    $("#variasi").append(`
                        <label>Nama Variasi</label>
                        <input type="text" name="nama_variasi[]"> <button id="tambah_value">Tambah Value</button> <button id="tambah_variasi">Tambah Variasi</button><br>
                        <div id="value_e">
                            <input type="text" name="value[]"> <br>
                        </div>
                    `);

                    $("#tambah_value").on('click', function(e) {
                        e.preventDefault();
                        $("#value_e").append(`
                            <input type="text" name="value[]"> <br>
                        `);
                    })
                }
            })

            $("#tambah").on('click', function(e) {
                e.preventDefault();
                var jsonObj = [];
                var valu = [];
                var result = [];
                var itemValue = [];

                if ($("#tipe_produk").val() == 'varian') {
                    $("input[name='nama_variasi[]']").map(function(i) {
                        let itemVariasi = {};
                        itemVariasi['nama_variasi'] = $(this).val();
                        jsonObj.push(itemVariasi);
                    }).get();

                    $("input[name='value[]']").map(function(i) {
                        itemValue.push($(this).val());
                    }).get();

                    valu.push(itemValue);
                    jsonObj[0]['value'] = valu;
                }

                $.ajax({
                    url: 'http://localhost:8000/store',
                    type: 'POST',
                    data: {
                        ket: $("#tipe_produk").val() == 'varian' ? JSON.stringify(jsonObj) : null,
                        prod: $('form').serialize()
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                    }
                });
                // $.post('http://localhost:8000/store', {data: jsonObj}, (response) => {
                //     console.log('oke');
                // })
            })

        })
    </script>
</body>

</html>
