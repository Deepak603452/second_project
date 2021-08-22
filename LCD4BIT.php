<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" name="viewport" content="width-device-width, initial-scale=1, shrink-to-fit=no">
    <title>AVR CODE IN C LANGUAGE</title>
    <link rel="stylesheet" type="text/css" href="finalcss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="script.js"></script>
</head>

<body style="background-color: lightpink;">
	<?php include("navbar.php");?><br>
<b><marquee><p style="font-family: sans-serif; font-size: 35px; color: red;">LCD 4 BIT</p></marquee></b><br>
<HR size="2"/><BR/><BR/>
<center><img src="lcd.jpg"></center><BR/><BR/>

<B><P style="font-family: sans-serif; font-size: 25px;">CODE!....</P></B><BR/>

<P style="font-family: sans-serif; font-size: 20px;">
#define F_CPU 8000000<BR/>
#include "avr/io.h"<BR/>
#include "util/delay.h"<BR/>
#include "lcd.h";<BR/>
<BR/>#define rs 0<BR/>
#define rw 1<BR/>
#define en 2<BR/>

<BR/>void lcd_init();<BR/>
void cmd(char );<BR/>
void data(char );<BR/>
void cmdbreak(char );<BR/>
void databreak(char );<BR/>
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
}<BR/><BR/>

void lcd_init()<BR/>
{<BR/>
	cmdbreak(0x02);<BR/>
	cmdbreak(0x28);<BR/>
	cmdbreak(0x0e);<BR/>
	cmdbreak(0x06);<BR/>
}<BR/>

void cmd(char x)<BR/>
{<BR/>
	PORTA=x;<BR/>
	<H10>PORTA&=~(1<<<H11>0)</H11></H10>;<BR/>
	<H7>PORTA&=~(1<<<H8>1);</H8></H7><BR/>
	<H8>PORTA|=(1<<<H9>2);</H9></H8><BR/>
	_delay_ms(1);<BR/>
	<H9>PORTA&=~(1<<<H10>2);</H9></H10><BR/>
	_delay_ms(1);<BR/>
}<BR/><BR/>

void data(char x)<BR/>
{<BR/>
	PORTA=x;<BR/>
	<H10>PORTA|=(1<<<H11>0);</H11></H10><BR/>
	<H7>PORTA&=~(1<<<H8>1);</H8></H7><BR/>
	<H8>PORTA|=(1<<<H9>2);</H9></H8><BR/>
	_delay_ms(1);<BR/>
	<H9>PORTA&=~(1<<<H10>2);</H10></H9><BR/>
	_delay_ms(1);<BR/>
}<BR/><BR/>

void cmdbreak(char x)<BR/>
{<BR/>
	cmd(x&0xf0);<BR/>
	<H10>cmd(((x<<<H11>4)&0xf0));</H11></H10><BR/>
}<BR/><BR/>

void databreak(char x)<BR/>
{<BR/>
	data(x&0xf0);<BR/>
	<H11>data(((x<<<H12>4)&0xf0));</H12></H11><BR/>
}<BR/><BR/>

<B><p style="font-family: sans-serif; font-size: 22px; color: red;">SCHMETIC CONNECTION IN PROTEUS!....</p></B><BR/>

<img src="lcd4bit.png" style=" height: 500px; width: 900px;"/>

<BR/><BR/><BR/>
	
	<?php include("footer.php");?>

</body>
</html>
