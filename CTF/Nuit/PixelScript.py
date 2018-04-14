from PIL import Image, ImageDraw, ImageFont
     
img = Image.new('RGB', (100, 30), color = (73, 109, 137))
     
#fnt = ImageFont.truetype('/Library/Fonts/Arial.ttf', 15)
d = ImageDraw.Draw(img)
d.text((10,10), "2 + 2 = 4", fill=(255, 255, 0))
     
img.save('test.png')