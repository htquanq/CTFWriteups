from PIL import Image, ImageDraw, ImageFont
from bs4 import 
img = Image.new('RGB', (800, 600), color = (73, 109, 137))
fnt = ImageFont.truetype('/Library/Fonts/Arial.ttf', 50)
d = ImageDraw.Draw(img)
d.text((300,300), "9+7=ord(x[13])",font =fnt,fill=(255, 255, 255))
img.save('pil_text_font.png')