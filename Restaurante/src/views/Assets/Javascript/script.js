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

/*CODIGOS PRO PERFIL*/

const iconeOlho = document.getElementById('login-olho');
      const inputSenha = document.getElementById('login-senha');
      const inputUsuario = document.getElementById('login-usuario');
      const form = document.getElementById('login-form');

      iconeOlho.addEventListener('click', () => {
          if (inputSenha.type === 'password') {
              inputSenha.type = 'text';
              iconeOlho.classList.remove('ri-eye-off-line');
              iconeOlho.classList.add('ri-eye-line');
          } else {
              inputSenha.type = 'password';
              iconeOlho.classList.remove('ri-eye-line');
              iconeOlho.classList.add('ri-eye-off-line');
          }
      });

      form.addEventListener('submit', (e) => {
          e.preventDefault(); // Evita o envio do formulário

          const usuario = inputUsuario.value.trim().toUpperCase(); // Aceita tanto maiúsculas quanto minúsculas
          const senha = inputSenha.value;

          const errorMessage = document.getElementById('error-message');
          const successMessage = document.getElementById('success-message');

          // Limpa mensagens anteriores
          errorMessage.style.display = 'none';
          successMessage.style.display = 'none';

          if (usuario === 'STEH7' && senha === '2659') {
              successMessage.textContent = 'Bem-vinda, STEH7!';
              successMessage.style.display = 'block';

              form.classList.add('login-success'); // Adiciona a classe de sucesso
              setTimeout(() => {
                  window.location.href = "espelho.html"; // Redireciona para a página desejada
              }, 2000); // Aguardar 2 segundos antes de redirecionar pro espelho
          } else {
              errorMessage.textContent = 'Você não tem permissão para logar, contate um admin.';
              errorMessage.style.display = 'block';
          }
      });

      window.onload = function() {
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');
        const messageBox = document.getElementById('message-box');

        if (status === 'success') {
            messageBox.textContent = 'Usuário cadastrado com sucesso!';
            messageBox.classList.add('success');
            messageBox.style.display = 'block';
        } else if (status === 'error') {
            messageBox.textContent = 'Erro: Email já cadastrado!';
            messageBox.classList.add('error');
            messageBox.style.display = 'block';
        }
    };

    window.onload = function() {
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');
        const messageBox = document.getElementById('message-box');

        if (status === 'error') {
            messageBox.textContent = 'Email ou senha incorretos!';
            messageBox.classList.add('error');
            messageBox.style.display = 'block';
        }
    };
