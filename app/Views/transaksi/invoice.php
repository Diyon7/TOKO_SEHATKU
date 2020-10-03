<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #000000;
            text-align: center;
        }
    </style>
</head>

<body>
    <div style="font-size: 64px; color:'#ddddddd'">Invoice</div>
    <p>
        <i>Toko Sehatku</i>

    </p>
    <hr>
    <hr>
    <br>
    <br>
    <p>Pembeli : <?= $pembeli ?><br>
        Alamat : <?= $alamat ?><br>
        Jumlah : <?= $jumlah ?><br>
        Total Harga : <?= $total_harga ?>
    </p>
    <table>
        <tr>
            <th><strong>Barang</strong></th>
            <th><strong>Harga Satuan</strong></th>
            <th><strong>Jumlah</strong></th>
            <th><strong>Total Harga</strong></th>
        </tr>
        <?php
        $total = 1;

        foreach ($cart->contents() as $key => $value) { ?>

            <tr>
                <td><?= $value['name'] ?></td>
                <td><?= number_to_currency($value['price'], 'IDR') ?></td>
                <td><?= $value['qty'] ?></td>
                <td><?= number_to_currency($value['subtotal'], 'IDR') ?></td>
            </tr>

        <?php } ?>
    </table>
</body>

</html>