<!doctype html>
<html lang="en">

<head>
    <!-- <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" /> -->
    <style>
    #quote_table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #quote_table td,
    #quote_table th {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    #quote_table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #quote_table tr:hover {
        background-color: #ddd;
    }

    #quote_table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: lightslategray;
        color: white;
    }
    </style>
</head>

<body>
    <h1>Quote Information</h1>

    <table id="quote_table">
        <tr>
            <th>Label</th>
            <th>Information</th>
        </tr>
        <tr>
            <td>Quote Owner</td>
            <td><?=$record['quote_name']?></td>
        </tr>
        <tr>
            <td>Subject</td>
            <td><?=$record['subject']?></td>
        </tr>
        <tr>
            <td>Current PIC Name</td>
            <td><?=$record['pic_name']?></td>
        </tr>
        <tr>
            <td>Account Name</td>
            <td><?=$accounts[0]['accountname']?></td>
        </tr>
        <tr>
            <td>Payment Term</td>
            <td><?=$record['payment_term']?></td>
        </tr>
        <tr>
            <td>Contact Name</td>
            <td><?=$contacts[0]['lastName']?></td>
        </tr>
        <tr>
            <td>Delivery Term</td>
            <td><?=$record['delivery_term']?></td>
        </tr>
        <tr>
            <td>Deal Name</td>
            <td><?=$record['deal_name']?></td>
        </tr>
        <tr>
            <td>Validity</td>
            <td><?=$record['validity']?></td>
        </tr>
        <tr>
            <td>Custom Quotation Date</td>
            <td><?=$record['cutom_quote_date']?></td>
        </tr>
    </table>
    <h2>Invoiced Items</h2>
    <table id="quote_table">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Product Name</th>
                <th>List Price</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Discount</th>
                <th>Tax</th>
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
                    <?= $row['amount'] ?>
                </td>
                <td>
                    <?= $row['discount'] ?>
                </td>
                <td>
                    <?= $row['tax'] ?>
                </td>
                <td>
                    <?= $row['total'] ?>
                </td>
            </tr>
            <?php $i ++; endforeach; ?>
        </tbody>
    </table>

    <h2>Invoice Fields</h2>

    <table id="quote_table">
        <tr>
            <th>Sub Total</th>
            <th>Discount</th>
            <th>Tax</th>
            <th>Adjustment</th>
            <th>Grand Total</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>

    <h2>Internal Comment</h2>

    <table id="quote_table">
        <tr>
            <th>Defect Comment</th>
            <th>Internal Comment</th>
        </tr>
        <tr>
            <td><?= $record['defect_comment'] ?></td>
            <td><?= $record['internal_comment'] ?></td>
        </tr>
    </table>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <h2>Term and Conditions</h2>
    <table id="quote_table">
        <tr>
            <td><?= $record['term_condition'] ?></td>
        </tr>
    </table>
    <h2>Description Information</h2>
    <table id="quote_table">
        <tr>
            <td><?= $record['description'] ?></td>
        </tr>
    </table>

    <h2>Address Information</h2>

    <table id="quote_table">
        <tr>
            <th>Label</th>
            <th>Information</th>
        </tr>
        <tr>
            <td>Billing Street</td>
            <td><?=$record['billing_street']?></td>
        </tr>
        <tr>
            <td>Shipping Street</td>
            <td><?=$record['shipping_street']?></td>
        </tr>
        <tr>
            <td>Billing City</td>
            <td><?=$record['billing_city']?></td>
        </tr>
        <tr>
            <td>Shipping City</td>
            <td><?=$record['shipping_city']?></td>
        </tr>
        <tr>
            <td>Billing State</td>
            <td><?=$record['billing_state']?></td>
        </tr>
        <tr>
            <td>Shipping State</td>
            <td><?=$record['shipping_state']?></td>
        </tr>
        <tr>
            <td>Billing Code</td>
            <td><?=$record['billling_code']?></td>
        </tr>
        <tr>
            <td>Shipping Code</td>
            <td><?=$record['shipping_code']?></td>
        </tr>
        <tr>
            <td>Billing Country</td>
            <td><?=$record['billing_country']?></td>
        </tr>
        <tr>
            <td>Shipping Country</td>
            <td><?=$record['shipping_country']?></td>
        </tr>
    </table>
    <h2>System info</h2>
    <table id="quote_table">
        <tr>
            <td>Bee Owner</td>
            <td><?= $record['bee_owner'] ?></td>
        </tr>
    </table>
</body>

</html>