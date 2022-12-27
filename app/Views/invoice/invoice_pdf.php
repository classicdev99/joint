<!doctype html>
<html lang="en">

<head>
    <!-- <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" /> -->
    <style>
    #invoice_table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
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
        background-color: lightslategray;
        color: white;
    }
    </style>
</head>

<body>
    <h1>Invoice Information</h1>

    <table id="invoice_table">
        <tr>
            <th>Label</th>
            <th>Information</th>
        </tr>
        <tr>
            <td>Invoice Owner</td>
            <td><?=$record['invoiceOwner']?></td>
        </tr>
        <tr>
            <td>Product Order</td>
            <td><?=$record['productOrder']?></td>
        </tr>
        <tr>
            <td>Subject</td>
            <td><?=$record['subject']?></td>
        </tr>
        <tr>
            <td>Purchase Order</td>
            <td><?=$record['purchaseOrder']?></td>
        </tr>
        <tr>
            <td>Invoice Date</td>
            <td><?=$record['invoiceDate']?></td>
        </tr>
        <tr>
            <td>Excise Duty</td>
            <td><?=$record['exciseDuty']?></td>
        </tr>
        <tr>
            <td>Due Date</td>
            <td><?=$record['dueDate']?></td>
        </tr>
        <tr>
            <td>Status</td>
            <td><?=$record['status']?></td>
        </tr>
        <tr>
            <td>Sales Commision</td>
            <td><?=$record['salesCommision']?></td>
        </tr>
        <tr>
            <td>Quote No</td>
            <td><?=$record['quoteNo']?></td>
        </tr>
        <tr>
            <td>Account Name</td>
            <td><?=$accounts[0]['accountname']?></td>
        </tr>
        <tr>
            <td>Contact Name</td>
            <td><?=$contacts[0]['lastName']?></td>
        </tr>
        <tr>
            <td>Payment Term</td>
            <td><?=$record['paymentTerm']?></td>
        </tr>
        <tr>
            <td>Delivery Terms</td>
            <td><?=$record['deliveryTerms']?></td>
        </tr>
        <tr>
            <td>Current PIC Name</td>
            <td><?=$record['currentPicName']?></td>
        </tr>
    </table>
    <h2>Invoiced Items</h2>
    <table id="invoice_table">
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
            <?php $i = 1; foreach ($invoice_items as $row) : ?>
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

    <table id="invoice_table">
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

    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <h2>Term and Conditions</h2>
    <table id="invoice_table">
        <tr>
            <td><?= $record['TermsAndCondition'] ?></td>
        </tr>
    </table>
    <h2>Description Information</h2>
    <table id="invoice_table">
        <tr>
            <td><?= $record['description'] ?></td>
        </tr>
    </table>

    <h2>Address Information</h2>

    <table id="invoice_table">
        <tr>
            <th>Label</th>
            <th>Information</th>
        </tr>
        <tr>
            <td>Billing Street</td>
            <td><?=$record['billingStreet']?></td>
        </tr>
        <tr>
            <td>Shipping Site</td>
            <td><?=$record['shippingSite']?></td>
        </tr>
        <tr>
            <td>Billing City</td>
            <td><?=$record['billingCity']?></td>
        </tr>
        <tr>
            <td>Shipping Street</td>
            <td><?=$record['shippingStreet']?></td>
        </tr>
        <tr>
            <td>Billing State</td>
            <td><?=$record['billingState']?></td>
        </tr>
        <tr>
            <td>Shipping City</td>
            <td><?=$record['shippingCity']?></td>
        </tr>
        <tr>
            <td>Shipping State</td>
            <td><?=$record['shippingState']?></td>
        </tr>
        <tr>
            <td>Billing Code</td>
            <td><?=$record['billingCode']?></td>
        </tr>
        <tr>
            <td>Shipping Code</td>
            <td><?=$record['shippingCode']?></td>
        </tr>
        <tr>
            <td>Billing Country</td>
            <td><?=$record['billingCountry']?></td>
        </tr>
        <tr>
            <td>Shipping Country</td>
            <td><?=$record['shippingCountry']?></td>
        </tr>
    </table>

</body>

</html>