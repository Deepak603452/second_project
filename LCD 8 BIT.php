<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" name="viewport" content="width-device-width, initial-scale=1, shrink-to-fit=no">
    <title>AVR C LANGUAGE CODE'S</title>
    <link rel="stylesheet" type="text/css" href="finalcss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="script.js"></script>
</head>

<body style="background-color: lightgrey;">
	<?php include("navbar.php");?><br>
<CENTER><img src="index0.jpg" style=" width: 150px; height: 100px;"/></CENTER>
</br>
<marquee><B><P style="font-family: sans-serif; color: red; font-size: 30px;">LCD 8 BIT!!....</P></B></marquee><br><br>
<HR size="2"/>

<BR/><BR/>

<B><P style="font-family: sans-serif; font-size: 22px;">CODE!....</P></B><BR/><BR/>

<P style="font-family: sans-serif; font-size: 20px;">
#define F_CPU 8000000<BR/>
#include "avr/io.h"<BR/>
#include "util/delay.h"<BR/>
<BR/>
void lcd_data(char);<BR/>
void lcd_comm(char);<BR/>
void lcd_init();<BR/>
void lcd_string(char*);<BR/>
void lcd_num(unsigned int);<BR/><BR/>
int main(void)<BR/>
{<BR/>
	int i=0;<BR/>
	lcd_init();<BR/>
	lcd_comm(0x85);<BR/>
	lcd_string("counter");<BR/>
	lcd_comm(0xC5);<BR/>
	lcd_num(i);<BR/>

<BR/>DDRD=0x00;<BR/>
while(1)<BR/>
{<BR/>
	if (PIND & (1<<0))<BR/>                                         
	{<BR/>
		i++;<BR/>
		lcd_comm(0xC5);<BR/>
		lcd_num(i);<BR/>
		while (PIND & (1<<0));<BR/>
	}<BR/>
}<BR/>
}<BR/>
<BR/><BR/>

void lcd_data(char x)<BR/>
{<BR/>
	PORTA=x;<BR/>
	<H7>PORTB|=(1<<<H8>0);</H8></H7><BR/>
	<H8>PORTB|=(1<<<H9>1);</H9></H8><BR/>
	_delay_ms(50);<BR/>
	<H8>PORTB&=~(1<<<H9>1);</H9></H8><BR/>
}<BR/><BR/><BR/>

void lcd_comm(char x)<BR/>
{<BR/>
	PORTA=x;<BR/>
	<H7>PORTB&=~(1<<<H8>0);</H8></H7><BR/>
	<H8>PORTB|=(1<<<H9>1);</H9></H8><BR/>
	_delay_ms(50);<BR/>
	<H9>PORTB&=~(1<<<H10>1);</H10></H9><BR/>
}
<BR/><BR/><BR/>
void lcd_init(void)<BR/>
{<BR/>
	DDRA=0xFF;<BR/>
	DDRB=0x03;<BR/>
	lcd_comm(0x38);<BR/>
	lcd_comm(0x06);<BR/>
	lcd_comm(0x0E);<BR/>
	
	lcd_comm(0x01);<BR/>   
	
}<BR/>
<BR/>void lcd_string(char *P)<BR/>
{<BR/>
	while (*P!='\0')<BR/>
	{<BR/>
		lcd_data(*P);<BR/>
		P++;<BR/>
	}<BR/>
}<BR/><BR/><BR/>

void lcd_num(unsigned int n)<BR/>
{<BR/>
	lcd_data((n/1000)+48);<BR/>
	n%=1000;<BR/>
	
	lcd_data((n/100)+48);<BR/>
	n%=100;<BR/>
	
	lcd_data((n/10)+48);<BR/>
	n%=10;<BR/>
	
	lcd_data(n+48);<BR/>

}<BR/><BR/>
</P>
<B><span style="font-family: sans-serif; font-size: 20px;">SCHMETIC CONNECTION IN PROTEUS!....</span></B>
<BR/>

<img src="lcd 8 bit.png" style=" height: 400px; width: 900px;"/>

<BR/><BR/><BR/>
	<?php include("footer.php");?>

</body>
</html>
