<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" name="viewport" content="width-device-width, initial-scale=1, shrink-to-fit=no">
    <title>AVR C LANGUAGE CODE</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="finalcss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="script.js"></script>
</head>

<body style="background-color: lightpink;">
    <?php include("navbar.php");?><br>
<B><marquee><P style="font-family: sans-serif; font-size: 30px; color: red;">7 SEGMENT WITH ARRAY</P></marquee></B>
</br>
<P><HR size="2"/>

<BR/><BR/>

<B><P style="font-family: sans-serif; font-size: 22px;">CODE!.....</P></B>
<P style="font-family: sans-serif; font-size: 20px;">
<BR/>

<BR/>#define F_CPU 8000000<BR/>
<BR/>#include "avr/io.h"<BR/>
#include "util/delay.h"<BR/>

<BR/>int main(void)<BR/>
{<BR/>
	DDRD=0xff;<BR/>
	DDRC=0xff;<BR/>
	char seg[]={0x3f,0x06,0x5b,0x4f,0x66,0x6d,0x7d,0x07,0x7f,0xef};<BR/>
		int i,j;<BR/>
    while(1)<BR/>
    {<BR/>
         for (i=0;i<=9;i++)<BR/>
         {<BR/>
			PORTC=seg[i];<BR/>
			for (j=0;j<=9;j++)<BR/>
			{<BR/>
				PORTD=seg[j];<BR/>
				_delay_ms(100);<BR/>
			}<BR/>
         }<BR/>
    }<BR/>
}<BR/>

<BR/><BR/>

<B><P style="font-family: sans-serif; font-size: 22px; color: red;">SCHMETIC CONNECTION IN PROTEUS!....</P></B>
<BR/>

<img src="7segment.png" style="height: 550px; width: 900px;"/>

<BR/><BR/><BR/>
</P>
    <?php include("footer.php");?>
</body>
</html>
