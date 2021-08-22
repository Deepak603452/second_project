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

<body style="background-color: lightblue;">
	<?php include("navbar.php");?><br>
<B><marquee><P style="font-family: sans-serif; font-size: 30px; color: red">INTERRUPT</P></marquee></B><br><br>
<HR size="2"/><BR/><BR/>
<B><P style="font-family: sans-serif; font-size: 22px;">CODE!....</P></B>

<BR/><BR/>
<P style="font-family: sans-serif; font-size: 20px;">

#define F_CPU 8000000<BR/>
#include "avr/io.h"<BR/>
#include "avr/interrupt.h"<BR/>
#include "util/delay.h"<BR/>
#include <a href="LCD4BIT.php" target="Details">"LCD.h"</a><BR/><BR/>
void interrupt_init();<BR/>
void lcd_string(char *);<BR/><BR/>
int main(void)<BR/>
{<BR/>
	DDRA=0xff;<BR/>
	DDRB=0x03; <BR/>
	lcd_init();<BR/>

	interrupt_init();<BR/>
    while(1)<BR/>
    {<BR/>
         lcd_string("ABCD");<BR/>
		 cmdbreak(0x01); <BR/> 
    }<BR/>
}<BR/><BR/>

void interrupt_init()<BR/>
{<BR/>
	<H7>GICR=GICR|(1<<<H8>INT0);</H8></H7><BR/>
	<H8>GICR=GICR|(1<<<H9>INT1);</H9></H8><BR/>
	MCUCR=0x02;<BR/>
	MCUCR=0x03;<BR/>
	sei();<BR/>
}<BR/><BR/>

ISR(INT0_vect)<BR/>
{<BR/>
	PORTB=0x01;<BR/>
	lcd_string("pagal");<BR/>
	_delay_ms(1000);<BR/>
	PORTB=0x00;<BR/>
}<BR/><BR/>
</P>
<B><P style="font-family: sans-serif; font-size: 22px; color: red;">SCHMETIC CONNECTION IN PROTEUS!....</P></B>
<br><br>

<img src="interrupt.png" style="height: 550px; width: 900px;"/><BR/><BR/>
<P style="font-family: sans-serif; font-size: 20px;">
ISR(INT1_vect)<BR/>
{   <BR/>
	PORTB=0x02;<BR/>
	lcd_string("C");<BR/>
	_delay_ms(1000);<BR/>
	PORTB=0x00;<BR/>
}<BR/><BR/>

void lcd_string(char *x)<BR/>
{<BR/>
	while(*x)<BR/>
	{<BR/>
		databreak(*x);<BR/>
		x++;<BR/>
		_delay_ms(100);<BR/>
	}<BR/>
}<BR/><BR/>
</P><br>

	<?php include("footer.php");?>
	
</body>
</html>