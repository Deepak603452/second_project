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
	<?php include("navbar.php");?>
<b><marquee><p style="font-family: sans-serif; font-size: 30px; color: red">GPS CAR</p></marquee></b>
<br><br>
<HR size="2"/><br>
<B><P style="font-family: sans-serif; font-size: 22px;">CODE!....</P></B>
<BR/>
<P style="font-family: sans-serif; font-size: 20px;">
#include "avr/io.h"<BR/>
#define F_CPU 8000000<BR/>
#include "util/delay.h"<BR/>
#include <a href="LCD4BIT.php" target="Details">"lcd.h"</a><BR/>
#include "uart.h"<BR/>
#include "string.h"<BR/>

<BR/>int main(void)<BR/>
{<BR/>
	char x=0;<BR/>
	int i;<BR/>
	char c=0;<BR/>
	DDRB=0x80;<BR/>
	lcd_init();<BR/>
	uart_init();<BR/>
	lcd_string("SMART CAR");<BR/>
	//lcd_comm(0xC0);<BR/>
	//lcd_string("Lon");<BR/>
	
	<BR/>char lat[10];<BR/>
	char lon[10];<BR/>
	char GGA[6]="GPGGA";<BR/>
	char dat[10];<BR/>
	char ctrlz[]={26};<BR/>
		
		
		<BR/>ADMUX=0x00;   //external AREF and Channel 0<BR/>
		ADCSRA=0x87;<BR/>
		
		<BR/>lcd_comm(0xC0);<BR/>
		
		ADCSRA|=1<<<H4>ADSC;</H4>
		<H4>while((ADCSRA & (1<<<H4>ADIF))==0);</H4></H4>
		<H4>ADCSRA|=1<<<H4>ADIF;</H4></H4></P>
		<P style="font-family: sans-serif; font-size: 20px;">
		//lcd_number(ADC);<BR/>
			if(ADC<190)<BR/>
			{<BR/>
			
		lcd_string("Have safe Journey");<BR/>
			}	<BR/>	
			else{<BR/>
		lcd_comm(0x01);<BR/>
		lcd_comm(0x80);<BR/>
		lcd_string("Alcohol Detected ");<BR/>
		lcd_comm(0xC0);<BR/>
		lcd_string("Don't drive");<BR/>
		
			}<BR/>
		
		
    <BR/>while(1)<BR/>
    {<BR/>
		
		
		
		
		PORTB&=~(1<<7);<BR/>
     if (PINB & 1)<BR/>
     {<BR/>
		
		while(1){<BR/>
		x=uart_receive();<BR/>
		if (x=='$')<BR/>
		{<BR/>
			for(i=0;i<=4;i++)<BR/>
			dat[i]=uart_receive();<BR/>
			
		
		<BR/>dat[i]='\0';<BR/>
		//uart_string(dat);<BR/>
		if((strcmp(dat,GGA))==0){<BR/>
			 PORTB|=1<<7;<BR/>
		for(i=0;i<=11;i++)	//pass<BR/>
		x=uart_receive();<BR/>
		for (i=0;i<=8;i++)  //latitude<BR/>
		{<BR/>
			x=uart_receive();<BR/>
			lat[i]=x;<BR/>
		}<BR/>
		lat[i]='\0';<BR/>
			
		
		
		for(i=0;i<=2;i++)	//pass<BR/>
		x=uart_receive();<BR/>
		
		for (i=0;i<=9;i++)  //longitude<BR/>
		{<BR/>
			x=uart_receive();<BR/>
			lon[i]=x;<BR/>
		}<BR/>
		<BR/>lon[i]='\0';<BR/>
		lcd_comm(0x01);<BR/>
		lcd_comm(0x80);<BR/>
		lcd_string("Lat=");<BR/>
		lcd_string(lat);<BR/>
		lcd_comm(0xC0);<BR/>
		lcd_string("Lon=");<BR/>
		lcd_string(lon);<BR/>
		c=1;<BR/>
		
		<BR/>uart_string("AT+CMGF=1\r");<BR/>
		_delay_ms(500);<BR/>
		uart_string("AT+CMGS=\"70116XXXXX\"\r");   //UR NUMBER<BR/>
		_delay_ms(2000);<BR/>
		uart_string("ALERT\n");<BR/>
		uart_string("Accident happened at location\n");<BR/>
		uart_string("latitude=");<BR/>
		uart_string(lat);<BR/>
		uart_string("\n");<BR/>
		uart_string("Longitude=");<BR/>
		
	<BR/>uart_string(lon);<BR/>
		_delay_ms(200);<BR/>
		uart_string(ctrlz);<BR/>
		//uart_string("ATD870000XXXX;\r");<BR/>
		} //compare closing<BR/>
		
		}  //$closing<BR/>
		if (c==1)<BR/>
		{<BR/>
			c=0;<BR/>
			break;<BR/>
		}<BR/>
		 }<BR/>
		
		
     }<BR/>
        
    }<BR/>
}</P><br><br>

   <?php include("footer.php");?>
</body>
</html>
