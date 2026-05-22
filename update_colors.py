import re

def process_file():
    with open('resources/views/welcome.blade.php', 'r', encoding='utf-8') as f:
        content = f.read()
    
    replacements = [
        (r'rgba\(56,189,248', 'rgba(157,78,221'),
        (r'linear-gradient\(90deg, \#00f5d4, \#9d4edd\)', 'linear-gradient(90deg, var(--color-neon-purple), var(--color-neon-magenta))'),
        (r'linear-gradient\(90deg, \#38bdf8, \#3b82f6\)', 'linear-gradient(90deg, var(--color-neon-purple), var(--color-neon-magenta))'),
        (r'border-top-color: \#00f5d4;', 'border-top-color: var(--color-neon-cyan);'),
        (r'border-top-color: \#38bdf8;', 'border-top-color: var(--color-neon-cyan);'),
        (r'border: 3px solid rgba\(0, 245, 212, 0\.2\);', 'border: 3px solid rgba(0, 245, 212, 0.2);'),
    ]
    
    for old, new in replacements:
        content = re.sub(old, new, content)
        
    with open('resources/views/welcome.blade.php', 'w', encoding='utf-8') as f:
        f.write(content)

if __name__ == '__main__':
    process_file()
    print("Done")
