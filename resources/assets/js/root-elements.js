import uniqueString from 'unique-string';

let multipleTextboxList = [
    {
        uid: '',
        title: 'Texto 1',
        answer: ''
    },
    {
        uid: '',
        title: 'Texto 2',
        answer: ''
    }
];

let contactInformationList = [
    {
        uid: '',
        title: 'Nombre',
        answer: '',
        required: false,
        include: true
    },
    {
        uid: '',
        title: 'Apellido',
        answer: '',
        required: false,
        include: true
    },
    {
        uid: '',
        title: 'E-mail',
        answer: '',
        required: false,
        include: true
    },
    {
        uid: '',
        title: 'Empresa',
        answer: '',
        required: false,
        include: true
    },
    {
        uid: '',
        title: 'Teléfono',
        answer: '',
        required: false,
        include: true
    },
    {
        uid: '',
        title: 'Dirección',
        answer: '',
        required: false,
        include: true
    },
    {
        uid: '',
        title: 'Ciudad',
        answer: '',
        required: false,
        include: true
    },
    {
        uid: '',
        title: 'País',
        answer: '',
        required: false,
        include: true
    },
    {
        uid: '',
        title: 'Sexo',
        answer: '',
        required: false,
        include: true
    },
    {
        uid: '',
        title: 'Fecha de Nacimiento',
        answer: 'mm/dd/yyyy',
        required: false,
        include: true
    }
];

let matrixRows = [
    {
        uid: '',
        text: 'Fila 1',
    },
    {
        uid: '',
        text: 'Fila 2',
    },
    {
        uid: '',
        text: 'Fila 3',
    },
];

let matrixCols = [
    {
        uid: '',
        text: 'Columna 1',
    },
    {
        uid: '',
        text: 'Columna 2',
    },
    {
        uid: '',
        text: 'Columna 3',
    },
];

let rootElements = [
    {
        uid: '',
        type: 'text',
        title: 'Single Text Box',
        className: 'fa-font',
        hide: false,
        config: {
            title: 'Single Text Box'
        },
        answer: ''
    },
    {
        uid: '',
        type: 'header',
        title: Lang.trans('Text'),
        className: 'fas fa-align-justify',
        hide: false,
        config: {
            title: Lang.trans('Text')
        },
        answer: ''
    },
    {
        uid: '',
        type: 'textarea',
        title: 'Comment Box',
        className: 'fa-comments',
        hide: false,
        config: {
            title: 'Comment Box'
        },
        answer: ''
    },
    {
        uid: '',
        type: 'dropdown',
        title: 'Dropdown',
        className: 'fa fa-caret-down',
        hide: false,
        config: {
            title: 'Dropdown',
            list: ['Option 1', 'Option 2'],
            hideConfig: {
                allow: false,
                options: {}
            }
        },
        answer: null
    },
    {
        uid: '',
        type: 'multiple-text',
        title: 'Multiple Textbooks',
        className: 'fa-align-left',
        hide: false,
        config: {
            title: 'Multiple Textbooks',
            list: multipleTextboxList
        },
        answer: {},
        onClone: () => {
            multipleTextboxList.forEach(option => {
                option.uid = uniqueString();
            });
        }
    },
    {
        uid: '',
        type: 'multiple-check',
        title: 'Multiple Choice',
        className: 'fa-check-square',
        hide: false,
        config: {
            title: 'Multiple Choice',
            list: ['Option 1', 'Option 2'],
            multiple: false,
            hideConfig: {
                allow: false,
                options: {}
            }
        },
        answer: []
    },
    {
        uid: '',
        type: 'slider',
        title: 'Slider',
        className: 'fa-sliders',
        hide: false,
        config: {
            title: 'Slider',
            zero: 'Malo',
            half: 'Regular',
            full: 'Bueno'
        },
        answer: 0
    },
      {
        uid: '',
        type: 'image',
        title: 'Image',
        className: 'fa-image',
        hide: false,
        config: {
            title: 'Image'
        },
        answer: ''
    },
    {
        uid: '',
        type: 'contact-information',
        title: 'Contact Information',
        className: 'fa-info',
        hide: false,
        config: {
            title: 'Contact Information',
            list: contactInformationList
        },
        answer: [],
        onClone: () => {
            contactInformationList.forEach(option => {
                option.uid = uniqueString();
            });
        }
    },
    {
        uid: '',
        type: 'matrix',
        title: 'Matrix',
        className: 'fa-th',
        hide: false,
        config: {
            title: 'Matrix',
            multiple: false,
            rows: matrixRows,
            cols: matrixCols,
        },
        answer: {},
        onClone: () => {
            matrixRows.concat(matrixCols).forEach(option => {
                option.uid = uniqueString();
            });
        }
    },
    {
        uid: '',
        type: 'matrix-scale',
        title: 'Matrix Ranking Scale',
        className: 'fa-th',
        hide: false,
        config: {
            title: 'Matrix Ranking Scale',
            rows: matrixRows,
            cols: matrixCols,
            options: ['1', '2', '3', '4', '5']
        },
        answer: {},
        onClone: () => {
            matrixRows.concat(matrixCols).forEach(option => {
                option.uid = uniqueString();
            });
        }
    },
    {
        uid: '',
        type: 'star-rating',
        title: 'Star Rating',
        className: 'fa fa-star',
        hide: false,
        config: {
            title: 'Star rating',
            hideConfig: {
                allow: false,
                options: {
                    1: [],
                    2: [],
                    3: [],
                    4: [],
                    5: [],
                }
            }
        },
        answer: 0
    },
    {
        uid: '',
        type: 'ranking',
        title: 'Ranking',
        className: 'fas fa-sort',
        hide: false,
        config: {
            title: 'Ranking',
            options: ['1', '2', '3', '4', '5']
        },
        answer: null
    }
];

export default rootElements;
