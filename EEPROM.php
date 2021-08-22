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
<B><marquee><P style="font-family: sans-serif; font-size: 30px; color: red;">EEPROM</P></marquee></B><br><br>
<HR Size="2"/>
<BR/><BR/>

<B><P style="font-family: sans-serif; font-size: 22px;">CODE!....</P></B><BR/>
<P style="font-family: sans-serif; font-size: 20px;">
#define F_CPU 8000000UL<BR/>
#include "avr/io.h"<BR/>
#include "util/delay.h"<BR/>
#include <a href="LCD4BIT.php" target="Details">"lcd.h"</a><BR/>
void EEPROM_write(unsigned int , char );<BR/>
char EEPROM_read(unsigned int );<BR/>
void lcdstring(char *);<BR/>
<BR/>int main()<BR/>
{<BR/>
	DDRB=0x00;<BR/>
	char x;<BR/>
	init_lcd();<BR/>
	cmdbreak(0x80);<BR/>
	lcdstring("Counter is");<BR/>
	x=EEPROM_read(0x00);<BR/>
	cmdbreak(0xC4);<BR/>
	lcd_num(x);<BR/>
	 while(1)<BR/>
	 {<BR/>
		 if (PINB & 1)<BR/>
		 {<BR/>
			 x++;<BR/>
			 cmdbreak(0xC4);<BR/>
			 lcd_num(x);<BR/>
			 EEPROM_write(0x00,x);<BR/>
			 while(PINB & 1);<BR/>
			 _delay_ms(500);<BR/>
		 }<BR/>
		 
		<BR/> else if (PINB & 2)<BR/>
		 {<BR/>
			 x--;<BR/>
			 cmdbreak(0xC4);<BR/>
			 lcd_num(x);<BR/>
			 EEPROM_write(0x00,x);<BR/>
			 while(PINB & 2);<BR/>
			 _delay_ms(500);<BR/>
		 }<BR/>
		 
	 }<BR/>
	
}<BR/><BR/><BR/>
void EEPROM_write(unsigned int add, char data)<BR/>
{<BR/>
	while((EECR & (1<<<H7/>EEWE)));<BR/>
	
	EEAR=add;<BR/>
	EEDR=data;<BR/>
	<H7/>EECR|=1<<<H8/>EEMWE;<BR/>
	<H9/>EECR|=1<<<H10/>EEWE;<BR/>	
}<BR/><BR/>

void lcdstring(char *p)<BR/>
{<BR/>
	while( *p !='\0')<BR/>
	{<BR/>
		databreak(*p);<BR/>
		p++;<BR/>
		_delay_ms(100);<BR/>
	}<BR/>
}<BR/><BR/>

char EEPROM_read(unsigned int add)<BR/>
{<BR/>
	<H11/>while((EECR & (1<<<H12/>EEWE)));<BR/>

	EEAR=0x00;<BR/>
	<H13/>EECR|=1<<<H14/>EERE;<BR/>
	return EEDR;<BR/>
}<BR/>

<BR/>void lcd_num(int n)<BR/>
{<BR/>
	
	databreak((n/1000)+48);<BR/>
	n%=1000;<BR/>
	
	databreak((n/100)+48);<BR/>
	n%=100;<BR/>
	
	databreak((n/10)+48);<BR/>
	n%=10;<BR/>
	
	databreak(n+48);<BR/>
}</P><BR/><BR/>
<B><P style="font-family: sans-serif; font-size: 22px; color: red;">SCHMETIC CONNECTION IN PROTEUS!....</P></B>
<BR/>

<img src="eeprom.png" style="height: 550px; width: 900px;"/><BR/><BR/><BR/><BR/>

	<?php include("footer.php");?>

</body>
</html>