// Portal de Notícias - Scripts
document.addEventListener('DOMContentLoaded', function() {
    
    // Auto-fechar alertas após 5 segundos
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.3s';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 300);
        }, 5000);
    });
    
    // Gerar slug automaticamente a partir do título (em formulários de criação)
    const tituloInput = document.querySelector('input[name="titulo"]');
    const slugInput = document.querySelector('input[name="slug"]');
    
    if (tituloInput && slugInput && !slugInput.value) {
        tituloInput.addEventListener('input', function() {
            const slug = this.value
                .toLowerCase()
                .normalize('NFD').replace(/[\u0300-\u036f]/g, '') // Remove acentos
                .replace(/[^\w\s-]/g, '') // Remove caracteres especiais
                .replace(/\s+/g, '-') // Substitui espaços por hífens
                .replace(/-+/g, '-') // Remove hífens duplicados
                .trim();
            slugInput.value = slug;
        });
    }
    
    // Confirmação de exclusão mais amigável
    const deleteButtons = document.querySelectorAll('button[onclick*="confirm"]');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            const confirmed = confirm('Tem certeza que deseja realizar esta ação? Esta operação não pode ser desfeita.');
            if (!confirmed) {
                e.preventDefault();
                return false;
            }
        });
    });
    
    // Marca link ativo no menu admin
    const currentPath = window.location.pathname;
    const menuLinks = document.querySelectorAll('.admin-menu a');
    menuLinks.forEach(link => {
        if (link.getAttribute('href') === currentPath || currentPath.startsWith(link.getAttribute('href') + '/')) {
            link.classList.add('active');
        }
    });
});

