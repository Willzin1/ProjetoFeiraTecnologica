$(document).ready(function() {
    $('#mobile_btn').on('click', function () {
        $('#mobile_menu').toggleClass('active');
        $('#mobile_btn').find('i').toggleClass('fa-x');
    });

    const sections = $('section');
    const navItems = $('.nav-item');

    $(window).on('scroll', function () {
        const header = $('header');
        const scrollPosition = $(window).scrollTop() - header.outerHeight();

        let activeSectionIndex = 0;

        if (scrollPosition <= 0) {
            header.css('box-shadow', 'none');
        } else {
            header.css('box-shadow', '5px 1px 5px rgba(0, 0, 0, 0.1');
        }

        sections.each(function(i) {
            const section = $(this);
            const sectionTop = section.offset().top - 96;
            const sectionBottom = sectionTop+ section.outerHeight();

            if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                activeSectionIndex = i;
                return false;
            }
        })

        navItems.removeClass('active');
        $(navItems[activeSectionIndex]).addClass('active');
    });

    ScrollReveal().reveal('#cta', {
        origin: 'left',
        duration: 2000,
        distance: '20%'
    });

    ScrollReveal().reveal('.prato', {
        origin: 'left',
        duration: 2000,
        distance: '20%'
    });

    ScrollReveal().reveal('#testimonial_chef', {
        origin: 'left',
        duration: 1000,
        distance: '20%'
    })

    ScrollReveal().reveal('.feedback', {
        origin: 'right',
        duration: 1000,
        distance: '20%'
    })
});

$(document).ready(function() { /* FUNÇÃO DE GIRO DOS CARDS DE FAVORITO, FAVOR, NÃO MEXER*/
    $('.prato').click(function() {
        $(this).toggleClass('active'); // Ativa ou desativa a rotação
    });
}); 

/* PARTE PARA ABRIR/FECHAR O MODAL DO EDITAR PERFIL */
function editarPerfil() {
    document.getElementById('modalOverlay').style.display = 'block';
    document.getElementById('modalEditarPerfil').style.display = 'block';
}

function fecharModal() {
    document.getElementById('modalOverlay').style.display = 'none';
    document.getElementById('modalEditarPerfil').style.display = 'none';
}

/* PARTE PARA ABRIR/FECHAR O MODAL DO DELETAR PERFIL */
function abrirModalDelete() {
    document.getElementById('modalOverlay').style.display = 'block';
    document.getElementById('deleteModal').style.display = 'block';
}

function fecharModalDelete() {
    document.getElementById('modalOverlay').style.display = 'none';
    document.getElementById('deleteModal').style.display = 'none';
}

/* PARTE PARA ABRIR/FECHAR O MODAL DA RESERVA */
function abrirModalReservas(){
    document.getElementById('modalOverlay').style.display = 'block';
    document.getElementById('modalEditarReserva').style.display = 'block';
}
function fecharModalReservas(){
    document.getElementById('modalOverlay').style.display = 'none';
    document.getElementById('modalEditarReserva').style.display = 'none';
}
