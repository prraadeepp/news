<?php
include "header.php";
if(!isset($_SESSION['success']) && $_SESSION['success']=="")
{
$_SESSION['error']="you need to log in first";
        header("<?php echo SITE_URL?>login.php");
        exit;
}
else{    ?> 

<body>           
 <div id="wrapper">
<?php
include 'navigator.php';

?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <?php
       echo $_SESSION['success'];
    $_SESSION['success']="";?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <h2>Some of my favourite lines</h2>
                        <p class="text-justify text-info" style="font-size: 125%"><i>Let us take the statements below as premises and compare them:<br>
                        i. If you want to “be something” good, work for yourself.<br>
ii. If you want to “make something” good, work for others.
A time comes to everyone which confuses whether to dedicate my time for me or for others. 
However, one who can go through sleepless nights, cutoff entertainment packages and labors above three quarters a day for months, 
for the sake of own, merely gets ready to continue those efforts while it comes for the sake of society or any other larger scale mass. 
That can be a partly reason why “being good” has been covering appreciable area of a pie while it competes with “making good”.</p>
<p>हामी अध्ययन्रत संस्था आजको लागि हाम्रो क्याम्पस् हो भने भोलीका लागि हाम्रो BRAND !
आफैमा एउटा नेत्रित्वदायी भूमिकामा रहन सक्षम् जमात समेत कसैको वहकाउमा लागेर अगाडि बढिदिने हो भने समग्र देशले नै सबल एवम् देशलाई माया गर्ने नेत्रित्व कहिले पाउने???
दर्ता भएका दलहरुको घोषणापत्र पढौँ, त्यसमा नेत्रित्व तहमा बसेका व्यक्तिहरुको क्षमता हेरौँ, पहिले उनीहरुले गरेका कामहरु पनि बुझौँ अनि आफ्नो निर्णय लिएर सही नेत्रित्वलाइ अवसर दिऔँ । 
#हाम्रो_भविष्य_हाम्रै_हातमा #स्ववियु_चुनाव</p>
<p>संक्रमणलाई पार गर्दै तिम्रो नाउ बढोस,<br>
समाधानकै बाटो तिर तिम्रो पाउ बढोस,<br>
अरुहरुको जे सुकै होस मलाइ मत्लब छैन,<br>
यसरी नै तिम्रो चाहि सधै भाउ बढोस ||| <br>
#falgun</p>
 <p>
"आज त्यसले त्यो माथिको रुखबाट फल टिपेर ल्याएर के भयो त,
अस्ति बाटो हिढ्दा त्यो रुखमा फल फलेको त मैले पनि देखेको थिए नि। 
त्यसैले त्यसको श्रेय त मैले पनि पाउनुपर्छ",अरे। :D :D 😂😂😂
#अचम्मको_प्रव्रित्ति :\ :\ <br></p></i>
              
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
include 'footer.php';   
}?>
