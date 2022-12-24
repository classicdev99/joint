<style>
    /* style.css */
    * {
        box-sizing: border-box;
        font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
        font-size: 16px;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    body {
        background-color: #FFFFFF;
        margin: 0;
    }

    .navtop {
        background-color: #3b4656;
        height: 60px;
        width: 100%;
        border: 0;
    }

    .navtop div {
        display: flex;
        margin: 0 auto;
        width: 800px;
        height: 100%;
    }

    .navtop div h1,
    .navtop div a {
        display: inline-flex;
        align-items: center;
    }

    .navtop div h1 {
        flex: 1;
        font-size: 24px;
        padding: 0;
        margin: 0;
        color: #ebedee;
        font-weight: normal;
    }

    .navtop div a {
        padding: 0 20px;
        text-decoration: none;
        color: #c4c8cc;
        font-weight: bold;
    }

    .navtop div a i {
        padding: 2px 8px 0 0;
    }

    .navtop div a:hover {
        color: #ebedee;
    }

    .content {
        width: 800px;
        margin: 0 auto;
    }

    .content h2 {
        margin: 0;
        padding: 25px 0;
        font-size: 22px;
        border-bottom: 1px solid #ebebeb;
        color: #666666;
    }

    /* end style.css */

    /* start calendar.css */
    .calendar {
        display: flex;
        flex-flow: column;
    }

    .calendar .header .month-year {
        font-size: 20px;
        font-weight: bold;
        color: #636e73;
        padding: 20px 0;
    }

    .calendar .days {
        display: flex;
        flex-flow: wrap;
    }

    .calendar .days .day_name {
        width: calc(100% / 7);
        border-right: 1px solid #2c7aca;
        padding: 20px;
        text-transform: uppercase;
        font-size: 12px;
        font-weight: bold;
        color: #818589;
        color: #fff;
        background-color: #448cd6;
    }

    .calendar .days .day_name:nth-child(7) {
        border: none;
    }

    .calendar .days .day_num {
        display: flex;
        flex-flow: column;
        width: calc(100% / 7);
        border-right: 1px solid #e6e9ea;
        border-bottom: 1px solid #e6e9ea;
        padding: 15px;
        font-weight: bold;
        color: #7c878d;
        cursor: pointer;
        min-height: 100px;
    }

    .calendar .days .day_num span {
        display: inline-flex;
        width: 30px;
        font-size: 14px;
    }

    .calendar .days .day_num .event {
        margin-top: 10px;
        font-weight: 500;
        font-size: 14px;
        padding: 3px 6px;
        border-radius: 4px;
        background-color: #f7c30d;
        color: #fff;
        word-wrap: break-word;
    }

    .calendar .days .day_num .event.green {
        background-color: #51ce57;
    }

    .calendar .days .day_num .event.blue {
        background-color: #518fce;
    }

    .calendar .days .day_num .event.red {
        background-color: #ce5151;
    }

    .calendar .days .day_num:nth-child(7n+1) {
        border-left: 1px solid #e6e9ea;
    }

    .calendar .days .day_num:hover {
        background-color: #fdfdfd;
    }

    .calendar .days .day_num.ignore {
        background-color: #fdfdfd;
        color: #ced2d4;
        cursor: inherit;
    }

    .calendar .days .day_num.selected {
        background-color: #f1f2f3;
        cursor: inherit;
    }

    /* end calendar.css */
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Job Calendar</title>
    <!-- <link href="style.css" rel="stylesheet" type="text/css">
    <link href="calendar.css" rel="stylesheet" type="text/css"> -->
</head>

<body>
    <nav class="navtop">
        <div>
            <h1>Job Calendar</h1>
        </div>
    </nav>
    <!-- <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown button
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">            
        </div>
    </div> -->
    <div class="content home">
        <?= $html ?>
    </div>
</body>

</html>
<!--<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>-->