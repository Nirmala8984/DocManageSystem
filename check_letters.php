<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dcouments Management System</title>
        <link rel="stylesheet" href="style_letters_check.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
    <?php include 'navi.php'; ?>
        <div class="date">
             <Center><h2>Dcouments of - <?php $currentYear = date("Y");
                                            echo $currentYear;?>
                     </h2></Center>
        </div>
        <div class="topdiv"> 
        <div class="filters">
    
    <input type="text" id="searchField1" placeholder="Letter number" class="ser1">
    <input type="text" id="searchField2" placeholder="Topic" class="ser2">
    <input type="text" id="searchField3" placeholder="Sender" class="ser3">
    <input type="text" id="searchField4" placeholder="Received date" class="ser4">
    <input type="text" id="searchField5" placeholder="Officer name" class="ser5">  
    <input type="text" id="searchField6" placeholder="Replay date" class="ser6">    
    <table id="dataTable" border="1">
        <thead>
            <tr>
                <th class="th1">Letter number</th>
                <th class="th2">Topic</th>
                <th class="th3">Sender</th>
                <th class="th4">Received date</th>
                <th class="th5">Officer name</th>
                <th class="th6">Letter </th>
                <th class="th7">Reply date</th>
                <th class="th8">Reply letter</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'letter_fetch_data.php'; ?>
        </tbody>
    </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#searchField1, #searchField2, #searchField3, #searchField4,#searchField5, #searchField6' ).on('input', function() {
                var search1 = $('#searchField1').val();
                var search2 = $('#searchField2').val();
                var search3 = $('#searchField3').val();
                var search4 = $('#searchField4').val();
                var search5 = $('#searchField5').val();
                var search6 = $('#searchField6').val();
            
                $.ajax({
                    url: 'letter_filter.php',
                    type: 'post',
                    data: {
                        search1: search1,
                        search2: search2,
                        search3: search3,
                        search4: search4,
                        search5: search5,
                        search6: search6
                    },
                    success: function(response) {
                        $('#dataTable tbody').html(response);
                    }
                });
            });
        });
        


    </script>

</div>

</body>
</html>