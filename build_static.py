import os
import shutil
import re

def build_static():
    # Directories
    src_views = 'resources/views/welcome.blade.php'
    src_assets = 'public/build/assets'
    src_images = 'public/images'
    
    dest_dir = 'vercel-build'
    dest_assets = os.path.join(dest_dir, 'assets')
    dest_images = os.path.join(dest_dir, 'images')
    
    # Create or clean dest dir
    if os.path.exists(dest_dir):
        shutil.rmtree(dest_dir)
    os.makedirs(dest_dir)
    os.makedirs(dest_images, exist_ok=True)
    
    # Copy assets
    if os.path.exists(src_assets):
        shutil.copytree(src_assets, dest_assets)
        
    # Copy images
    if os.path.exists(src_images):
        for item in os.listdir(src_images):
            s = os.path.join(src_images, item)
            d = os.path.join(dest_images, item)
            if os.path.isfile(s):
                shutil.copy2(s, d)
                
    # Read blade file
    with open(src_views, 'r', encoding='utf-8') as f:
        html = f.read()
        
    # Get the asset filenames
    css_file = ''
    js_file = ''
    if os.path.exists(dest_assets):
        for f in os.listdir(dest_assets):
            if f.endswith('.css'):
                css_file = f
            elif f.endswith('.js'):
                js_file = f
                
    # Replace @vite with actual HTML tags
    vite_tags = f"""<link rel="stylesheet" href="./assets/{css_file}">
    <script type="module" src="./assets/{js_file}"></script>"""
    
    html = re.sub(r'@vite\(\[.*?\]\)', vite_tags, html)
    
    # Replace image asset function
    html = re.sub(r'\{\{\s*asset\(\'images/profile\.jpg\'\)\s*\}\}', './images/profile.jpg', html)
    
    # Replace other Laravel functions just in case
    html = re.sub(r'\{\{\s*(.*?)\s*\}\}', r'\1', html)
    
    # Write index.html
    with open(os.path.join(dest_dir, 'index.html'), 'w', encoding='utf-8') as f:
        f.write(html)
        
if __name__ == '__main__':
    build_static()
    print("Static build created in vercel-build directory.")
