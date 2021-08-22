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
<body style="background-color: lightgrey;">
	<?php include("navbar.php");?>
<B><marquee><P style="font-family: sans-serif; font-size: 30px; color: red;">GSM SYSTEM</P></marquee></B>
<br><br>
<HR size="2"/>
<BR/><BR/>
<B><P style="font-family: sans-serif; font-size: 22px;">CODE!....</P></B>
<br>
<P style="font-family: sans-serif; font-size: 20px;">
#define F_CPU 8000000<BR/>
#include "avr/io.h"<BR/>
#include "util/delay.h"<BR/>
#include <a href="LCD4BIT.php" target="Details">"LCD.h"</a><BR/>

void string(char *x);<BR/>
void tx_string(char *x);<BR/>
void usart_init();<BR/>
void gsm0();<BR/>
void gsm1();<BR/><BR/>
int main(void)<BR/>
{<BR/>
	DDRC=0x0f;<BR/>
	lcd_init();<BR/>
	usart_init();<BR/>
	string("WELCOME SIR");<BR/>
    while(1)<BR/>
    {<BR/>
         if (PINC&0x01)<BR/>
         {<BR/>
			 gsm0();<BR/>
			 cmdbreak(0xc0);<BR/>
			 string("MDS");<BR/>
			 PORTC=(0x04);<BR/>
			 //PORTC&=~(0x08);<BR/>
         }<BR/><BR/>
		 else if(PINC&0x02)<BR/>
		 {<BR/>
			 gsm1();<BR/>
			 //PORTC&=~(0x04);<BR/>
			 PORTC=(0x08);<BR/>
			 PORTA=0x00;<BR/>
			 cmdbreak(0xc0);<BR/>
			 string("DMS");<BR/>
		 }<BR/>
    }<BR/>
}<BR/><BR/>

void tx_string(char *x)<BR/>
{<BR/>
	while(*x)<BR/>
	{<BR/>
	UDR=*x;<BR/>
	<H10>while( (UCSRA&(1<<<H11>UDRE))==0){};</H11></H10>
		_delay_ms(10);<BR/>
		x++;<BR/>
	}<BR/>
}<BR/><BR/>

void usart_init()<BR/>
{<BR/>
	<H7>UCSRB=UCSRB|(1<<<H8>TXEN);</H8></H7><BR/>
	<H8>UCSRC=UCSRC|(1<<<H9>URSEL)|(1<<<H10>UCSZ1)|(1<<<H11>UCSZ0);</H11></H10></H9></H8><BR/>
	UBRRL=0x33;<BR/>
}<BR/><BR/>

void gsm0()<BR/>
{<BR/>
	char ctrlz[]={26};<BR/>
		tx_string("ATD701XXXXXX0");<BR/>
		_delay_ms(100);<BR/>
		tx_string(ctrlz);<BR/>
		_delay_ms(100);<BR/>
}<BR/><BR/>

void gsm1()<BR/>
{<BR/>
	char ctrlz[]={26};<BR/>
		tx_string("ATH");<BR/>
		_delay_ms(100);<BR/>
		tx_string(ctrlz);<BR/>
		_delay_ms(100);<BR/>
}<BR/><BR/>

void string(char *x)<BR/>
{<BR/>
	while (*x)<BR/>
	{<BR/>
		databreak(*x);<BR/>
		x++;<BR/>
		_delay_ms(1);<BR/>
	}<BR/>
}<BR/>
</P><BR/><BR/>

<B><P style="font-family: sans-serif; font-size: 22px; color: red;">SCHMETIC CONNECTION IN PROTEUS!....</P></B>
<BR/>

<img src="gsm.png" style="height: 550px; width: 900px;"/><BR/><BR/><br>

   <?php include("footer.php");?>
</body>
</html>
