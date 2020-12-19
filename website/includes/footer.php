<footer>

<ul>
    <li>Copyright <?php
    $startDate = 2019;
    $currentDate = date('Y');
    if($startDate == $currentDate){
            echo $currentDate;
    }else{
            echo ' '.$startDate.'-'.$currentDate.'';
    } //end else
    ?>
    </li>
            <li>All Rights Reserved</li>
            <li><a href="">Web design by JW</a></li>
<li><a href='http://validator.w3.org/check/referer' target='_blank'>Valid HTML</a> ~ <a href='http://jigsaw.w3.org/css-validator/check?uri=referer' target='_blank'>Valid CSS</a></li>
</ul>
</footer>
<!-- end wrapper -->
</body>
</html>