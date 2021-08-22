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
<body style="background-color: skyblue;">
	<?php include("navbar.php");?><br>
<b><marquee><P style="font-family: sans-serif; font-size: 32px; color: red;">I2C EXPANDER</P></marquee></b><br><br>

<HR size="2"/>
<BR/>
<CENTER><B><P style="font-family: sans-serif; font-size: 32px;">Two-wire Serial Interface</P></B></CENTER><BR/>


<B><P style="font-family: sans-serif; font-size: 22px;">Features...</P></B><BR/>
<P style="font-family: sans-serif; font-size: 20px;">
• Simple Yet Powerful and Flexible Communication Interface, Only Two Bus Lines Needed.<BR/>
• Both Master and Slave Operation Supported.<BR/>
• Device Can Operate as Transmitter or Receiver.<BR/>
• 7-bit Address Space allows up to 128 Different Slave Addresses.<BR/>
• Multi-master Arbitration Support.<BR/>
• Up to 400 kHz Data Transfer Speed.<BR/>
• Slew-rate Limited Output Drivers.<BR/>
• Noise Suppression Circuitry Rejects Spikes on Bus Lines.<BR/>
• Fully Programmable Slave Address with General Call Support.<BR/>
• Address Recognition causes Wake-up when AVR is in Sleep Mode.</P><BR/>

<BR/><BR/>
<B><P style="font-family: sans-serif; font-size: 22px;">Two-wire Serial Interface Bus Definition...</P><BR/>
<P style="font-family: sans-serif; font-size: 20px;">
The Two-wire Serial Interface (TWI) is ideally suited for typical microcontroller applications. The
TWI protocol allows the systems designer to interconnect up to 128 different devices using only
two bi-directional bus lines, one for clock (SCL) and one for data (SDA). The only external hardware
needed to implement the bus is a single pull-up resistor for each of the TWI bus lines. All
devices connected to the bus have individual addresses, and mechanisms for resolving bus
contention are inherent in the TWI protocol.</P>

<br>
<HR Size="1"><br><br>
<B><P style="font-family: sans-serif; font-size: 22px;">CODE.....</P></B><BR/>
<P style="font-family: sans-serif; font-size: 20px;">
#define F_CPU 8000000<BR/>
#include "avr/io.h"<BR/>
#include "util/delay.h"<BR/>
#include <a hreef="LCD4BIT.php" target="Details">"LCD.h"</a><BR/>
#include "usartinit.h"<BR/>

<BR/>void txstring(char *);<BR/>
void i2c_slave_add();<BR/>
void i2c_slave_data();<BR/>
<BR/><BR/>int main(void)<BR/>
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
}<BR/>

<BR/>void txstring(char *x)<BR/>
{<BR/>
	while(*x)<BR/>
	{<BR/>
		UDR=*x;<BR/>
		<H9>while((UCSRA&(1<<<H10>UDRE))==0){}</H10></H9><BR/>
		x++;<BR/>
		_delay_ms(100);<BR/>
	}<BR/>
}<BR/>


<BR/>void i2c_slave_add()<BR/>
{<BR/> 
	TWAR=0x40;<BR/>
	TWCR=TWCR|(1<<<H9/>TWEA)|(1<<<H10/>TWEN)|(1<<<H11/>TWINT);<BR/>
	<H8/>while((TWCR&(1<<<H9/>TWINT))==0){}<BR/>
	switch (TWSR)<BR/>
	{<BR/>
		case 0x60: txstring("Own SLA+W has been received;ACK returned\r");<BR/>
		break;<BR/>
		case 0x70: txstring("General call add receive;ACK return");<BR/>
		break;<BR/>
       default: txstring("error\r");<BR/>
		break;<BR/>
	}<BR/>
}<BR/>

<BR/>void i2c_slave_data()<BR/>
{ <BR/>
	
    //TWDR=x;<BR/>
	TWCR=TWCR|(1<<<H8/>TWINT)|(1<<<H9/>TWEA);<BR/>
	<H11/>while((TWCR&(1<<<H12/>TWINT))==0){}<BR/>
	switch (TWSR)<BR/>
	{<BR/>
		case 0x80: txstring("Prev add with own SLA+W data receiv ACK return\r");<BR/>
		break;<BR/>
		case 0x90: txstring("Prev add with general call data receive ACK return");<BR/>
		break;<BR/>
		default: txstring("error in data receive\r");<BR/>
		break;<BR/>
	}<BR/>
}<BR/>
</P>
	<br><br>
   <?php include("footer.php");?>
</body>
</html>
