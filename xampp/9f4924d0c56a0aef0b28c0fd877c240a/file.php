<?php
// the message
$msg = "Hello souabh99
             Congratulation! you have successfully registered for the forth round of google code jam.comptetion detail are given below
             
             Now your idea submission phase has been started you have two days to submit your idea if you are selected for the competition 
             you will be invited at dublin,ireland. Don't worry traveling,accomodation and food are on us. You have to just carry your laptop
             or whatever thing is needed for the competition and plus your programming skills with you.
             competition will be of 42 hours in which 25 question are given to you and you have solve all of them any how. We wish you good luck
              winners will be carried to round five which will be held in california.And in google their is no place for loosers!!!!
          ";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);
$headers = "From: master@ibuiltinfra.com" . "\r\n" .
"CC: sourabhkaushik26@yahoo.com";
// send email
mail("sourabhkaushik26@yahoo.com","CODEJAM",$msg,$headers);
echo "hygg";
?> 