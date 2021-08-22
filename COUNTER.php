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
<B><marquee><P style="font-family: sans-serif; font-size: 30px; color: red;">AVR COUNTER</P></marquee></B>
<br><br><HR size="2"/>

<BR/><BR/>
<B><P style="font-family: sans-serif; font-size: 22px;">CODE!....</P></B>
<br><P style="font-family: sans-serif; font-size: 20px;">
#define F_CPU 8000000<BR/>
#include "avr/io.h"<BR/>
#include "util/delay.h"<BR/>
#include <a href="LCD4BIT.php" target="Details">"lcd.h"</a><BR/>
<br>
void counter_init();<BR/>
void count();<BR/>
void binary_ASCII(int );<BR/>

<BR/>int main(void)<BR/>
{<BR/>
	DDRA=0xff;<BR/>
	counter_init();<BR/>
	lcd_init();<BR/>
    while(1)<BR/>
	{<BR/>
         //count();<BR/>   
		 binary_ASCII(TCNT0);<BR/>     
    }<BR/>
}<BR/>

<BR/><BR/>void counter_init()<BR/>
{<BR/>
	TCNT0=0;  //timmer reg 0<BR/>
	TCCR0=0x06;  //conter falling edge<BR/>
}<BR/>
</P>
<BR/><BR/>

<P style="font-family: sans-serif; font-size: 20px;">
<BR/><BR/>void count()<BR/>
{<BR/>
	do<BR/> 
	{  //PORTA=TCNT0;         //value store in porta<BR/>
	} while ((TIFR&(1<<TOV0))==0);<BR/>
}<BR/>

<BR/><BR/>void binary_ASCII(int a)
<BR/>{<BR/>
	int a1;<BR/>
	char pos;<BR/>
	pos=0xc3;<BR/>
	for (int i=0;i<=3;i++)<BR/>
	{<BR/>
		cmdbreak(pos);<BR/>
		a1=a%10;<BR/>
		a=a/10;<BR/>
		databreak(a1+48);<BR/>
		pos--;<BR/>
	}<BR/>
}<BR/></P><br>

<B><P style="font-family: sans-serif; font-size: 22px; color: red;">SCHMETIC CONNECTION IN PROTEUS!....</P></B>
<BR/>

<img src="counter.png" style="height: 550px; width: 900px;"/>
<br><br><br>

	<?php include("footer.php");?>

</body>
</html>
