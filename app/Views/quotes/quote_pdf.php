<!doctype html>
<html lang="en">

<head>
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .header_title {
        margin: 0;
        padding: 0;
        height: 100px;
    }

    .quotation_title {
        color: skyblue;
        border-top: 2px solid lightgray;
        border-bottom: 2px solid lightgray;
        font-size: 24px;
        font-weight: bold;
        padding-left: 20px;
        padding-right: 20px;
    }

    .quotation_title .quotation_title_left {
        display: inline-block;
    }

    .quotation_title .quotation_title_right {
        display: inline-block;
        float: right;
    }

    .bill_section {
        margin: 10px 20px 10px 20px;
        color: skyblue;
        font-size: 18px;
    }

    .bill_section .bill_left {
        display: inline-block;
        height: 100px;
        font-weight: bold;
    }

    .bill_section .bill_right {
        display: inline-block;
        height: 100px;
        width: 50%;
        float: right;
    }

    .bill_section .bill_right table {
        border-collapse: collapse;
        width: 100%;
        text-align: left;
    }

    .bill_section .bill_right table td:first-child {

        border: 3px solid #ddd;
        padding: 8px;
        width: 50%;
        text-align: left;
    }

    .bill_section .bill_right table td:nth-child(2) {

        border: 3px solid #ddd;
        padding: 8px;
        width: 50%;
        text-align: left;
    }

    #invoice_table {
        margin-top: 150px;
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        font-size: 14px;
    }

    #invoice_table td,
    #invoice_table th {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    #invoice_table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #invoice_table tr:hover {
        background-color: #ddd;
    }

    #invoice_table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: lightgray;
        color: black;
    }

    .lead_time_section {
        margin: 30px;
        border-bottom: 2px solid lightgray;
    }

    .lead_time_section p {
        font-weight: bold;
        margin-left: 30px;
        font-size: 12px;
    }

    .terms_section {
        margin: 30px;
        font-size: 12px;
        font-weight: bold;
    }

    .terms_section .terms_left {
        display: inline-block;
    }

    .terms_section .terms_right {
        display: inline-block;
        float: right;
        width: 50%;
    }

    .terms_section .terms_right table {
        width: 100%;
        font-size: 18px;
        font-weight: bold;
        text-align: right;
    }

    .terms_section .terms_right table td {
        width: 50%;
    }

    .terms_section .terms_right .grand_total {
        font-size: 20px;
        width: 100%;
        margin-top: 30px;
        border-top: 2px solid lightgray;
        border-bottom: 2px solid lightgray;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .terms_section .terms_right .grand_total td {
        width: 50%;
    }

    .terms_and_conditions {
        margin: 30px;
        font-weight: bold;
        width: 60%;
    }

    .terms_and_conditions .title {
        font-size: 16px;

    }

    .terms_and_conditions .content {
        margin: 0;
        padding: 0;
        margin-left: 10px;
        font-size: 12px;
    }

    .last_section {
        margin: 30px;
    }

    .last_section .last_left {
        display: inline-block;
        font-size: 12px;
        font-weight: bold;
        width: 50%;
    }

    .last_section .last_left p {
        margin: 0;
        padding: 0;
    }

    .last_section .last_right {
        display: inline-block;
        width: 40%;
        float: right;
        font-size: 14px;
        font-weight: bold;
    }

    .last_section .last_right p {
        text-align: right;
    }
    </style>
</head>

<body>
    <h1 class="header_title"></h1>
    <div class="quotation_title">
        <p class="quotation_title_left">Quotation</h2>
        <p class="quotation_title_right">Doc No:MQ-11234</h2>
    </div>
    <div class="bill_section">
        <div class="bill_left">
            <p>Bill to</h4>
            <p>Somebody</h5>
        </div>
        <div class="bill_right">
            <table>
                <tr>
                    <td>Attn</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tel</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Fax</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Sales person</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>

    <table id="invoice_table">
        <thead>
            <tr>
                <th>No</th>
                <th style="width:60%">Product Details</th>
                <th>List Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach ($quote_items as $row) : ?>
            <tr id=<?="addr".$i?>>
                <td><?= $i ?></td>
                <td>
                    <?= $row['product_name'] ?>
                </td>
                <td>
                    <?= $row['list_price'] ?>
                </td>
                <td>
                    <?= $row['quantity'] ?>
                </td>
                <td>
                    <?= $row['total'] ?>
                </td>
            </tr>
            <?php $i ++; endforeach; ?>
        </tbody>
    </table>

    <div class="lead_time_section">
        <p>Lead time:</p>
    </div>

    <div class="terms_section">
        <div class="terms_left">
            <p>Payment Terms: <?= $record['payment_term'] ?> Days</p>
            <p>Delivery Terms: <?= $record['delivery_term'] ?> Days</p>
            <p>&nbsp;</p>
            <p>Validity: 14 Days</p>
        </div>
        <div class="terms_right">
            <table>
                <tr>
                    <td>Sub Total:</td>
                    <td>MYR 0.00</td>
                </tr>
                <tr>
                    <td>Discount:</td>
                    <td>(MYR 0.00)</td>
                </tr>
            </table>
            <table class="grand_total">
                <tr>
                    <td>Grand Total:</td>
                    <td>MYR 0.00</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="terms_and_conditions">
        <p class="title">Terms & Conditions</p>
        <?php
            $array = preg_split("/\r\n|\n|\r/", $record["term_condition"]);
            foreach ($array as $line) :
                echo "<p class='content'>".$line."</p>";
        endforeach;
        
        ?>
    </div>
    <div class="last_section">
        <div class="last_left">
            <p>We hope that our quotation is favourable to you and we are looking forward to receive your valued orders.
            </p>
            <span>If you require further clarification, please do not hesitate to contact us.</span>
            <p>We confirmed the order by accepting the terms & conditions stated above:</p>
        </div>
        <div class="last_right">
            <p>
                Computer generated, no signature are required
            </p>
            <p>
                ???
            </p>
        </div>
    </div>
</body>

</html>