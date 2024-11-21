let modalBtns = document.querySelectorAll('[data-target]')
let closeModal = document.querySelectorAll('.close-modal')

modalBtns.forEach(function(btn){
    btn.addEventListener('click', function(){
        document.querySelector(btn.dataset.target).classList.add('modal-active')
    })
})

closeModal.forEach(function(btn){
    btn.addEventListener('click', function(){
        document.querySelector(btn.dataset.target).classList.remove('modal-active')
    })
})

// document.addEventListener('DOMContentLoaded', () => {
//     const languageOptions = document.querySelectorAll('.language-option');

//     languageOptions.forEach(option => {
//         option.addEventListener('click', (event) => {
//             event.preventDefault();
//             const selectedLang = option.getAttribute('data-lang');
//             translatePage(selectedLang);
//         });
//     });

//     function translatePage(lang) {
//         // Placeholder: Language-specific translations should be defined here.
//         const translations = {
//             lv: {
//                 logo: 'IT atbalsts',
//                 apply1: 'Izveidot pieteikumu',
//                 apply1: 'Iegādaties PRO',
//                 InfoTitle: 'Uzticams IT atbalsts',
//                 InfoDescription: 'Sniedzam kvalitatīvu IT atbalstu privātpersonām un uzņēmumiem dažādās problēmsituācijās ar datoru, tā perifērijas ierīcēm, programmatūru un internetu gan attālināti, gan dodoties pie klienta klātuienē. Iesniedz savu pieteikumu un mēs ar Jums sazināsimies!',
//                 InfoButton: 'Izveidot pieteikumu',
//                 PakalpojumiTitle: '',
//             },
//             en: {
//                 title: 'Reliable IT Support',
//                 description: 'We provide high-quality IT support for individuals and businesses in various problem situations...'
//             },
//             ru: {
//                 title: 'Надежная IT поддержка',
//                 description: 'Мы предоставляем качественную IT-поддержку для частных лиц и компаний в различных ситуациях...'
//             }
//         };

//         if (translations[lang]) {
//             document.querySelector('h1').textContent = translations[lang].title;
//             document.querySelector('.info .content p').textContent = translations[lang].description;
//         } else {
//             console.warn(`No translations available for language: ${lang}`);
//         }
//     }
// });


// Translations for each text id

// Translation dictionary
const translations = {
    en: {
        logotext: 'IT support',
        mainTitle: "Reliable IT Support",
        mainDescription: "We provide quality IT support for individuals and businesses in various computer, peripheral, software, and internet issues, both remotely and on-site. Submit your request, and we will contact you!",
        createticketlink: 'Create an application',
        createTicketBtn: "Create an application",
        buyProBtn: "Buy PRO",
        servicesTitle: "Our <span>Services</span>",
        service1: "Service 1",
        service1Desc: "Description of this specific service",
        service2: "Service 2",
        service2Desc: "Description of this specific service",
        service3: "Service 3",
        service3Desc: "Description of this specific service",
        service4: "Service 4",
        service4Desc: "Description of this specific service",
        proPlanTitle: "Purchase <span>PRO</span> Plan",
        proPlanDescription: "Choose the PRO plan, and our specialists will contact you much faster than in the free version! Plus, all on-site services will receive a 50% discount.",
        buyProLink: "Buy PRO for only 99.<sup>99</sup> EUR/year",
        reviewsTitle: "Customer <span>Reviews</span>",
        review1: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit deserunt, corrupti natus voluptatem animi minima quidem officia voluptatum enim et corporis dolorum explicabo magnam placeat?",
        review2: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit deserunt, corrupti natus voluptatem animi minima quidem officia voluptatum enim et corporis dolorum explicabo magnam placeat?",
        review3: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit deserunt, corrupti natus voluptatem animi minima quidem officia voluptatum enim et corporis dolorum explicabo magnam placeat?",
        review4: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit deserunt, corrupti natus voluptatem animi minima quidem officia voluptatum enim et corporis dolorum explicabo magnam placeat?",
        reviewer1Name: "Andrejs Zarins",
        reviewer2Name: "Janis Klavins",
        reviewer3Name: "Agnese Lapina",
        reviewer4Name: "Karlis Liepins",
        languagesTitle: "Languages",
        contactTitle: "Contacts",
        contactPhone: "+371 29 999 999",
        contactEmail: "it@support.com",
        contactAddress: "Ventspils Street 51, Liepaja",
        contactButton: 'Contact form for communication',
        socialTitle: "Follow Us",
        footerCopyright: "All rights reserved - IT Support © 2024",
        modalTitle: "Create a new application",
        modalVards: "Name:",
        modalUzvards: "Surname:",
        modalEpasts: "E-mail address:",
        modalTel: "Phone number:",
        modalAprakst: "Description of the problem/task:",
        modalButton: "Send",
    },
    lv: {
        logotext: 'IT atbalsts',
        mainTitle: "Uzticams IT atbalsts",
        mainDescription: "Sniedzam kvalitatīvu IT atbalstu privātpersonām un uzņēmumiem dažādās problēmsituācijās ar datoru, tā perifērijas ierīcēm, programmatūru un internetu gan attālināti, gan dodoties pie klienta klātienē. Iesniedz savu pieteikumu un mēs ar Jums sazināsimies!",
        createticketlink: 'Izveidot pieteikumu',
        createTicketBtn: "Izveidot pieteikumu",
        buyProBtn: "Iegādāties PRO",
        servicesTitle: "Mūsu piedāvātie <span>pakalpojumi</span>",
        service1: "Pakalpojums 1",
        service1Desc: "Apraksts par konkrēto pakalpojumu",
        service2: "Pakalpojums 2",
        service2Desc: "Apraksts par konkrēto pakalpojumu",
        service3: "Pakalpojums 3",
        service3Desc: "Apraksts par konkrēto pakalpojumu",
        service4: "Pakalpojums 4",
        service4Desc: "Apraksts par konkrēto pakalpojumu",
        proPlanTitle: "Iegādājies <span>PRO</span> plānu",
        proPlanDescription: "Izvēlies maksas plānu PRO, mūsu speciālisti ar Jums sazināsies daudz ātrāk nekā tas ir bezmaksas versijā! Turklāt visiem klātienes pakalpojumiem tiks piešķirta 50% atlaide.",
        buyProLink: "Iegādāties PRO tikai par 99.<sup>99</sup> EUR/gadā",
        reviewsTitle: "Klientu <span>atsauksmes</span>",
        review1: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit deserunt, corrupti natus voluptatem animi minima quidem officia voluptatum enim et corporis dolorum explicabo magnam placeat?",
        review2: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit deserunt, corrupti natus voluptatem animi minima quidem officia voluptatum enim et corporis dolorum explicabo magnam placeat?",
        review3: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit deserunt, corrupti natus voluptatem animi minima quidem officia voluptatum enim et corporis dolorum explicabo magnam placeat?",
        review4: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit deserunt, corrupti natus voluptatem animi minima quidem officia voluptatum enim et corporis dolorum explicabo magnam placeat?",
        reviewer1Name: "Andrejs Zariņš",
        reviewer2Name: "Jānis Kļaviņš",
        reviewer3Name: "Agnese Lapiņa",
        reviewer4Name: "Kārlis Liepiņš",
        languagesTitle: "Valodas",
        contactTitle: "Kontakti",
        contactPhone: "+371 29 999 999",
        contactEmail: "it@atbalsts.lv",
        contactAddress: "Ventspils iela 51, Liepāja",
        contactButton: 'Kontaktforma saziņai',
        socialTitle: "Seko mums",
        footerCopyright: "Visas autortiesības aizsargātas - IT atbalsts © 2024",
        modalTitle: "Izveidot jaunu pieteikumu",
        modalVards: "Vārds:",
        modalUzvards: "Uzvārds:",
        modalEpasts: "E-pasta adrese:",
        modalTel: "Tālruņa numurs:",
        modalAprakst: "Problēmas / veicamā uzdevuma apraksts:",
        modalButton: "Nosūtīt",
    },
    ru: {
        logotext: 'ИТ поддержка',
        mainTitle: "Надежная IT поддержка",
        mainDescription: "Мы предоставляем качественную IT поддержку для частных лиц и бизнеса в различных проблемных ситуациях с компьютером, периферийными устройствами, программным обеспечением и интернетом как удаленно, так и выезжая к клиенту на место. Подайте заявку, и мы свяжемся с вами!",
        createticketlink: 'Создать заявку',
        createTicketBtn: "Создать заявку",
        buyProBtn: "Купить PRO",
        servicesTitle: "Наши <span>услуги</span>",
        service1: "Услуга 1",
        service1Desc: "Описание данной услуги",
        service2: "Услуга 2",
        service2Desc: "Описание данной услуги",
        service3: "Услуга 3",
        service3Desc: "Описание данной услуги",
        service4: "Услуга 4",
        service4Desc: "Описание данной услуги",
        proPlanTitle: "Купить <span>PRO</span> план",
        proPlanDescription: "Выберите платный план PRO, и наши специалисты свяжутся с вами гораздо быстрее, чем в бесплатной версии! Кроме того, на все выездные услуги предоставляется скидка 50%.",
        buyProLink: "Купить PRO всего за 99.<sup>99</sup> EUR/год",
        reviewsTitle: "Отзывы <span>клиентов</span>",
        review1: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit deserunt, corrupti natus voluptatem animi minima quidem officia voluptatum enim et corporis dolorum explicabo magnam placeat?",
        review2: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit deserunt, corrupti natus voluptatem animi minima quidem officia voluptatum enim et corporis dolorum explicabo magnam placeat?",
        review3: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit deserunt, corrupti natus voluptatem animi minima quidem officia voluptatum enim et corporis dolorum explicabo magnam placeat?",
        review4: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit deserunt, corrupti natus voluptatem animi minima quidem officia voluptatum enim et corporis dolorum explicabo magnam placeat?",
        reviewer1Name: "Андрей Зариньш",
        reviewer2Name: "Янис Клявиньш",
        reviewer3Name: "Агнес Лапина",
        reviewer4Name: "Карлис Лиепиньш",
        languagesTitle: "Языки",
        contactTitle: "Контакты",
        contactPhone: "+371 29 999 999",
        contactEmail: "it@support.com",
        contactAddress: "Улица Вентспилс 51, Лиепая",
        contactButton: 'Контактная форма для связи',
        socialTitle: "Подписывайтесь на нас",
        footerCopyright: "Все права защищены - IT поддержка © 2024",
        modalTitle: "Создать новое приложение",
        modalVards: "Имя:",
        modalUzvards: "Фамилия:",
        modalEpasts: "Адрес электронной почты:",
        modalTel: "Номер телефона:",
        modalAprakst: "Описание проблемы/задачи:",
        modalButton: "Отправлять",
    }
};

// Function to translate text based on selected language
function translateText(lang) {
    const elements = {
        logotext: document.getElementById("logo-text"),
        mainTitle: document.getElementById("main-title"),
        mainDescription: document.getElementById("main-description"),
        createticketlink: document.getElementById("create-ticket-link"),
        createTicketBtn: document.getElementById("create-ticket-btn"),
        buyProBtn: document.getElementById("buy-pro-btn"),
        servicesTitle: document.getElementById("services-title"),
        service1: document.getElementById("service-1"),
        service1Desc: document.getElementById("service-1-desc"),
        service2: document.getElementById("service-2"),
        service2Desc: document.getElementById("service-2-desc"),
        service3: document.getElementById("service-3"),
        service3Desc: document.getElementById("service-3-desc"),
        service4: document.getElementById("service-4"),
        service4Desc: document.getElementById("service-4-desc"),
        proPlanTitle: document.getElementById("pro-plan-title"),
        proPlanDescription: document.getElementById("pro-plan-description"),
        buyProLink: document.getElementById("buy-pro-link"),
        reviewsTitle: document.getElementById("reviews-title"),
        review1: document.getElementById("review-1"),
        review2: document.getElementById("review-2"),
        review3: document.getElementById("review-3"),
        review4: document.getElementById("review-4"),
        reviewer1Name: document.getElementById("reviewer-1-name"),
        reviewer2Name: document.getElementById("reviewer-2-name"),
        reviewer3Name: document.getElementById("reviewer-3-name"),
        reviewer4Name: document.getElementById("reviewer-4-name"),
        languagesTitle: document.getElementById("languages-title"),
        contactTitle: document.getElementById("contact-title"),
        contactPhone: document.getElementById("contact-phone"),
        contactEmail: document.getElementById("contact-email"),
        contactButton: document.getElementById("contact-button"),
        contactAddress: document.getElementById("contact-address"),
        socialTitle: document.getElementById("social-title"),
        footerCopyright: document.getElementById("footer-copyright"),
        modalTitle: document.getElementById("modal-title"),
        modalVards: document.getElementById("modal-vards"),
        modalUzvards: document.getElementById("modal-uzvards"),
        modalEpasts: document.getElementById("modal-epasts"),
        modalTel: document.getElementById("modal-tel"),
        modalAprakst: document.getElementById("modal-desc"),
        modalButton: document.getElementById("submit-button"),
    };

    // Update each element's text with the translated content
    for (const key in elements) {
        if (elements[key] && translations[lang][key]) {
            elements[key].innerHTML = translations[lang][key];
        }
    }

    // Save the selected language to local storage
    localStorage.setItem('selectedLanguage', lang);
}

// Apply the saved language from local storage on page load
document.addEventListener("DOMContentLoaded", () => {
    const savedLang = localStorage.getItem('selectedLanguage') || 'lv';
    translateText(savedLang);

    // Event listeners for language options
    document.querySelectorAll(".language-option").forEach(option => {
        option.addEventListener("click", (event) => {
            event.preventDefault();
            const lang = option.getAttribute("data-lang");
            translateText(lang);
        });
    });
});
