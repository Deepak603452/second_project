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
	<?php include("navbar.php");?><br>
<CENTER><img src="index0.jpg" style="width: 150px; height: 150px;"/></CENTER>
<marquee><B><P style="font-family: sans-serif; font-size: 30px; color: red;">TWO WIRE INTERFACE (I2C)....</P></B></marquee><br><br>
<HR Size="2"/>
<BR/><BR/>

<B><P style="font-family: sans-serif; font-size: 22px;">MASTER CODE....</P></B>
<BR/><BR/>
<P style="font-family: sans-serif; font-size: 20px;">
#define F_CPU 8000000<BR/>
#include "avr/io.h"<BR/>
#include "util/delay.h"<BR/><BR/>

void usart_init();<BR/>
void txstring(char *);<BR/>
void i2c_address();<BR/>
void i2c_data(char );<BR/>
void i2c_start();<BR/><BR/>
int main(void)<BR/>
{<BR/>
	usart_init();<BR/>
	i2c_start();<BR/>
	i2c_address();<BR/>
	
    while(1)<BR/>
    {<BR/>
	    i2c_data('D');<BR/>	
		_delay_ms(200);<BR/>
		i2c_data('M');<BR/>
		_delay_ms(200);<BR/>
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



void i2c_start()<BR/>
{<BR/>
	<H8>TWCR=TWCR|(1<<<H9>TWEA)|(1<<<H10>TWEN)|(1<<<H11>TWINT)|(1<<<H12>TWSTA);</H12></H11></H10></H9></H8><BR/>
	<H8>while((TWCR&(1<<<H9>TWINT))==0){}</H9></H8><BR/>
	switch (TWSR)<BR/>
	{<BR/>
			case 0x08: txstring("start has been transmit \r");<BR/>
			break;<BR/>
			case 0x10: txstring("repeated start has been transmit\r ");<BR/>
			break;<BR/>
			default: txstring("error start not be transmit \r");<BR/>
		    break;<BR/>
		}<BR/>
}<BR/><BR/>

void i2c_address()<BR/>
{<BR/>
	TWDR=0x40;<BR/>

	<H9>TWCR=TWCR|(1<<<H10>TWINT)|(1<<<H11>TWEA);</H11></H10></H9><BR/>

	<H8>while((TWCR&(1<<<H9>TWINT))==0){}</H9></H8><BR/>
	switch (TWSR)<BR/>
	{<BR/>
		    case 0x18: txstring("SLA+W has been transmitted;ACk been received\r"); <BR/>                <BR/>//txstring("general call add receive ack return ");<BR/>
			break;<BR/>
			case  0x20: txstring("SLA+W has been trransmitted;NACK has been recived \r");<BR/>
			break;<BR/>
			default : txstring("error in add transmit \r");<BR/>
			break;<BR/>
		}<BR/>
}<BR/><BR/>

void i2c_data(char x)<BR/>
{ <BR/>
	DDRA=0xff;<BR/>
	TWDR=x;<BR/>
	PORTA=x;<BR/>
	
	<H9>TWCR=TWCR|(1<<<H10>TWINT)|(1<<<H11>TWEA);</H9></H10></H9><BR/>
	
	<H8>while((TWCR&(1<<<H9>TWINT))==0){}</H9></H8><BR/>
	switch (TWSR)<BR/>
	{<BR/>
			case 0x28: txstring("data has been transmit acknowledgement receive \r");<BR/>
			break;<BR/>
			case 0x30: txstring("data transmit not ack receive \r");<BR/>
			break;<BR/>
			case 0x38: txstring("arbitration \r");<BR/>
			break;<BR/>
			default : txstring("data not transmit \r");<BR/>
			break;<BR/>
		}<BR/>
}</P><BR/><BR/>

   <?php include("footer.php");?>

</body>
</html>