<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>TITLE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
    html {
        width: 100%;
        height: 300px;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        color: darkslategray;
        background-color: #f5f5f5;
    }

    td {
        font-size: 60px;
        color: black !important;
    }

    a {
        margin-left: 20px;
    }

    .header {
        font-size: 30px !important;
    }

    .subheader {
        font-size: 20px !important;
        text-align: right;
        margin-right: 10px;
    }

    .child {
        border: 1px solid;
        border-top: none;
        border-left: none;
        border-right: none;
    }
    </style>
</head>

<?php include('MakeViewData.php'); ?>

<body>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td class="header" align="center">Title</td>
            <div class="subheader"><?php echo $rate ?><a href="http://tsp-rd02/ts-pro">link</a></div>
        </tr>
        <tr>
            <td align="center">
                <table width="100%" border="0" cellpadding="20" cellspacing="0" bgcolor="#ffffff">
                    <tr>
                        <td align="center">
                            <table width="25%" border="0" cellpadding="20" cellspacing="0">
                                <tr>
                                    <td class="child" align="center" style="font-weight: bold;">
                                        <?php echo $child; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="parent" align="center" style="font-weight: bold;">
                                        <?php echo $parent; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>