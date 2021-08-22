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

<body style="background-color:lightgrey">
	<?php include("navbar.php");?><br>
<img srrc="Atmel_AVR_(logo).jpg" style="width: 150px; height: 150px;"/>
<marquee><B><P style="font-family: sans-serif; font-size: 30px; color: red;">TWO WIRE INTERFACE (I2C)....</P></B></marquee><br><br>
<HR size="2"/>
<BR/><BR/>

<B><P style="font-family: sans-serif; font-size: 22px;">SLAVE CODE....</P></B>
<BR/><BR/>
<P style="font-family: sans-serif; font-size: 20px;">
#define F_CPU 8000000<BR/>
#include "avr/io.h"
#include "util/delay.h"<BR/><BR/>
#include <a href="LCD4BIT.php" target="Details">"LCD.h"</a><BR/>

void usart_init();<BR/>
void txstring(char *);<BR/>
void i2c_slave_add();<BR/>
void i2c_slave_data();<BR/><BR/>

int main(void)<BR/>
{<BR/>
	
	DDRA=0xff;<BR/>
	usart_init();<BR/>
	i2c_slave_add();<BR/>
	lcd_init();<BR/>
    while(1)<BR/>
    {<BR/>
		i2c_slave_data();<BR/>
		databreak(TWDR); <BR/>
    }<BR/>
}<BR/><BR/>

void usart_init()<BR/>
{<BR/>
	<H9>UCSRB=UCSRB|(1<<<H10>TXEN);</H10></H9><BR/>
	<H9>UCSRC=UCSRC|(1<<<H10>URSEL)|(1<<<H11>UCSZ0)|(1<<<H12>UCSZ1);</H12></H11></H10></H9><BR/>
	UBRRL=0x33;<BR/>
}<BR/><BR/>

void txstring(char *x)<BR/>
{<BR/>
	while(*x)<BR/>
	{<BR/>
		UDR=*x;<BR/>
		<H8>while((UCSRA&(1<<<H9>UDRE))==0){}</H9></H8><BR/>
		x++;<BR/>
		_delay_ms(100);<BR/>
	}<BR/>
}<BR/><BR/>


void i2c_slave_add()<BR/>
{ <BR/>
	TWAR=0x40;<BR/>
	<H8>TWCR=TWCR|(1<<<H9>TWEA)|(1<<<H10>TWEN)|(1<<<H11>TWINT);</H11></H10></H9></H8><BR/>
	<H8>while((TWCR&(1<<<H9>TWINT))==0){}</H9></H8><BR/>
	switch (TWSR)<BR/>
	{<BR/>
		case 0x60: txstring("Own SLA+W has been received;ACK returned\r");<BR/>
		break;<BR/>
		case 0x70: txstring("General call add receive;ACK return");<BR/>
		break;<BR/>
       default: txstring("error\r");<BR/>
		break;<BR/>
	}<BR/>
}<BR/><BR/>

void i2c_slave_data()<BR/>
{ <BR/>
	
    //TWDR=x;<BR/>
	databreak(TWDR);<BR/>
	<H8>TWCR=TWCR|(1<<<H9>TWINT)|(1<<<H10>TWEA);</H10></H9></H8><BR/>
	<H8>while((TWCR&(1<<<H9>TWINT))==0){}</H9></H8><BR/>
	switch (TWSR)<BR/>
	{<BR/>
		case 0x80: txstring("Prev add with own SLA+W data receiv ACK return\r");<BR/>
		break;<BR/>
		case 0x90: txstring("Prev add with general call data receive ACK return");<BR/>
		break;<BR/>
		default: txstring("error in data receive\r");<BR/>
		break;<BR/>
	}<BR/>
}</P><BR/><BR/>

   <?php include("footer.php");?>

</body>
</html>