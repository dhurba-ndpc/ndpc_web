from pathlib import Path
path = Path('public/frontend/ndpc.css')
text = path.read_text(encoding='utf-8')
replacements = [
    ('--blue: #1a3a8f;', '--blue: #193980;'),
    ('#183981', 'var(--dark)'),
    ('#003893', 'var(--dark)'),
    ('#1a3a8f', 'var(--dark)'),
    ('rgba(74, 111, 207,', 'rgba(25, 57, 128,'),
    ('rgba(26, 58, 143,', 'rgba(25, 57, 128,'),
    ('linear-gradient(135deg, #1a3a8f, #4a6fcf)', 'linear-gradient(135deg, var(--dark), rgba(25, 57, 128, 0.7))'),
    ('linear-gradient(180deg, rgba(0, 56, 147, 1) 0%, rgba(255, 255, 255, 0) 100%)', 'linear-gradient(180deg, rgba(25, 57, 128, 1) 0%, rgba(255, 255, 255, 0) 100%)'),
    ('background-color: #19398045 !important;', 'background-color: rgba(25, 57, 128, 0.27) !important;'),
    ('background-color: #19398045;', 'background-color: rgba(25, 57, 128, 0.27);'),
    ('color: #333;', 'color: #1f2937;'),
    ('color: #1a1a1a;', 'color: #111827;'),
    ('color: #555;', 'color: #4b5563;'),
    ('color: #666;', 'color: #4b5563;'),
    ('color: #888;', 'color: #6b7280;'),
    ('border: 1px solid #ddd;', 'border: 1px solid rgba(25, 57, 128, 0.12);'),
    ('border: 1px solid #f0f0f0;', 'border: 1px solid rgba(25, 57, 128, 0.12);'),
    ('border-top: 1px solid #f0f0f0;', 'border-top: 1px solid rgba(25, 57, 128, 0.12);'),
    ('font-size: 2.8rem;', 'font-size: 2.4rem;'),
    ('font-size: 2.6rem;', 'font-size: 2.2rem;'),
    ('font-size: 2.4rem;', 'font-size: 2.2rem;'),
    ('font-size: 1.9rem;', 'font-size: 2rem;'),
    ('font-size: 1.7rem;', 'font-size: 1.8rem;'),
    ('font-size: .68rem;', 'font-size: .75rem;'),
    ('font-size: .78rem;', 'font-size: .85rem;'),
]
for old, new in replacements:
    text = text.replace(old, new)

if '/* Unified minimal typography */' not in text:
    body_start = text.find('body {')
    if body_start != -1:
        body_end = text.find('}', body_start)
        if body_end != -1:
            insert_pos = body_end + 1
            extra = '\n\n/* Unified minimal typography */\n'
            extra += 'h1, h2, h3, h4, h5, h6 { color: var(--dark); font-weight: 700; line-height: 1.2; }\n'
            extra += 'p { color: #4b5563; font-size: 1rem; line-height: 1.75; }\n'
            extra += '.card, .news-card, .gallery-card, .team-card, .job-vacancy-card, .archive-item, .about-img-wrap { border-color: rgba(25, 57, 128, 0.12); }\n'
            text = text[:insert_pos] + extra + text[insert_pos:]

path.write_text(text, encoding='utf-8')
print('Updated ndpc.css')
