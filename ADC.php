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
<B><marquee><p style="font-family: sans-serif; font-size: 30px; color: red;">ANALOG TO DIGITAL CONVERTER</p></marquee></B>
<BR/>
<BR/><HR size="2"/>


<BR/><B><p style="font-family: sans-serif; font-size: 22px;">Features...</p></B> </br>

<p style="font-family: sans-serif; font-size: 20px;">
• 10-bit Resolution.<BR/> 
• 0.5 LSB Integral Non-linearity.<BR/> 
• ±2 LSB Absolute Accuracy.<BR/> 
• 13 - 260 µs Conversion Time.<BR/> 
• Up to 15 kSPS at Maximum Resolution.<BR/> 
• 8 Multiplexed Single Ended Input Channels.<BR/> 
• 7 Differential Input Channels.<BR/> 

• 2 Differential Input Channels with Optional Gain of 10x and 200x.<BR/> 
• Optional Left adjustment for ADC Result Readout.<BR/> 
• 0 - VCC ADC Input Voltage Range.<BR/> 
• Selectable 2.56V ADC Reference Voltage.<BR/> 
• Free Running or Single Conversion Mode.<BR/> 
• ADC Start Conversion by Auto Triggering on Interrupt Sources.<BR/> 
• Interrupt on ADC Conversion Complete.<BR/> 
• Sleep Mode Noise Canceler.<BR/></p> 

<BR/><BR/><BR/>
<B><p style="font-family: sans-serif; font-size: 22px;">ANALOG TO DIGITAL CONVERTER......</p></B><br>
<p style="font-family: sans-serif; font-size: 20px;">

The ATmega16 features a 10-bit successive approximation ADC. The ADC is connected to an
8-channel Analog Multiplexer which allows 8 single-ended voltage inputs constructed from the
pins of Port A. The single-ended voltage inputs refer to 0V (GND).

The device also supports 16 differential voltage input combinations. Two of the differential inputs
(ADC1, ADC0 and ADC3, ADC2) are equipped with a programmable gain stage, providing
amplification steps of 0 dB (1x), 20 dB (10x), or 46 dB (200x) on the differential input voltage
before the A/D conversion. Seven differential analog input channels share a common negative
terminal (ADC1), while any other ADC input can be selected as the positive input terminal. If 1x
or 10x gain is used, 8-bit resolution can be expected. If 200x gain is used, 7-bit resolution can be
expected.

The ADC contains a Sample and Hold circuit which ensures that the input voltage to the ADC is
held at a constant level during conversion.</p>

<BR/><BR/>
<HR Size="2"/></br>
<B><p style="font-family: sans-serif; font-size: 20px;">CODE.....</p></B><BR/>

<p style="font-family: sans-serif; font-size: 18px;">
<BR/>#define F_CPU 8000000<BR/>
#include "avr/io.h"<BR/>
#include "util/delay.h"<BR/><BR/>

void adc_init();<BR/>
void lcd_init();<BR/>
void cmd(char );<BR/>
void cmdbreak(char );<BR/>
void data(char );<BR/>
void databreak(char );<BR/>
void binary_to_ASCII(int );<BR/><BR/>

int main(void)<BR/>
{<BR/>
	DDRD=0xff;<BR/>
	int b;       //v;<BR/>
	lcd_init();<BR/>
	adc_init();<BR/>
    while(1)<BR/>
    {<BR/>
        <H8>ADCSRA=ADCSRA|(1<<<H9>ADSC);</H8></H9><BR/>
		<H9>while((ADCSRA&(1<<<H10>ADIF))==0){}</H9></H10><BR/>
		b=ADC;<BR/>
		//v=((b*5)/1023); <BR/>
		//binary_to_ASCII(v);<BR/>
		//binary_to_ASCII(b);<BR/>
		binary_to_ASCII(b/2);<BR/>
		
    }<BR/>
}<BR/><BR/>

void binary_to_ASCII(int a)<BR/>
{<BR/>
	int a1,i;<BR/>
	char pos=0xc3;<BR/>
	for (i=0;i<=3;i++)<BR/>
	{<BR/>
		cmdbreak(pos);<BR/>
		a1=a%10;<BR/>
		a=a/10;<BR/>
		databreak(a1+48);<BR/>
		pos--;<BR/>
	}<BR/>
}<BR/><BR/>


void adc_init()<BR/>
{<BR/>
	ADMUX=0x40;<BR/>
	ADCSRA=0xA7;<BR/>
}<BR/><BR/>


void lcd_init()<BR/>
{<BR/>
	cmdbreak(0x02);<BR/>
	cmdbreak(0x28);<BR/>
	cmdbreak(0x0e);<BR/>
	cmdbreak(0x06);<BR/>
}<BR/><BR/>

void cmd(char x)<BR/>
{<BR/>
	PORTD=x;<BR/>
	<H10>PORTD&=~(1<<<H11>0)</H11></H10>;<BR/>
	<H7>PORTD&=~(1<<<H8>1);</H8></H7><BR/>
	<H8>PORTD|=(1<<<H9>2);</H9></H8><BR/>
	_delay_ms(1);<BR/>
	<H9>PORTD&=~(1<<<H10>2);</H9></H10><BR/>
	_delay_ms(1);<BR/>
}<BR/><BR/>

void data(char x)<BR/>
{<BR/>
	PORTD=x;<BR/>
	<H10>PORTD|=(1<<<H11>0);</H11></H10><BR/>
	<H7>PORTD&=~(1<<<H8>1);</H8></H7><BR/>
	<H8>PORTD|=(1<<<H9>2);</H9></H8><BR/>
	_delay_ms(1);<BR/>
	<H9>PORTD&=~(1<<<H10>2);</H10></H9><BR/>
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
}<BR/><BR/><BR/>
<BR/>
</p>
<B><p style="font-family: sans-serif; font-size: 18px; color: red;">SCHMETIC CONNECTION IN PROTEUS!....</p></B>
<BR/>

<img src="adc.png" style="height: 550px; width: 900px;"/>
<BR/>
<BR/><BR/>

	<?php include("footer.php");?>
</body>
</html>
