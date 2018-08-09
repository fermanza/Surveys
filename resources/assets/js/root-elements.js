import uniqueString from 'unique-string';

let multipleTextboxList = [
    {
        uid: '',
        title: Lang.trans('Text 1'),
        answer: ''
    },
    {
        uid: '',
        title: Lang.trans('Text 2'),
        answer: ''
    }
];

let rankingList = [
    {
        uid: '',
        title: Lang.trans('Option 1'),
        answer: '' 
    },
    {
        uid: '',
        title: Lang.trans('Option 2'),
        answer: '' 
    },
    {
        uid: '',
        title: Lang.trans('Option 2'),
        answer: '' 
    }
];

let contactInformationList = [
    {
        uid: '',
        title: Lang.trans('Name'),
        answer: '',
        required: false,
        include: true
    },
    {
        uid: '',
        title: Lang.trans('Last name'),
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
        title: Lang.trans('Company'),
        answer: '',
        required: false,
        include: true
    },
    {
        uid: '',
        title: Lang.trans('Phone'),
        answer: '',
        required: false,
        include: true
    },
    {
        uid: '',
        title: Lang.trans('Address'),
        answer: '',
        required: false,
        include: true
    },
    {
        uid: '',
        title: Lang.trans('City'),
        answer: '',
        required: false,
        include: true
    },
    {
        uid: '',
        title: Lang.trans('Country'),
        answer: '',
        required: false,
        include: true
    },
    {
        uid: '',
        title: Lang.trans('Gender'),
        answer: '',
        required: false,
        include: true
    },
    {
        uid: '',
        title: Lang.trans('Date of birth'),
        answer: 'mm/dd/yyyy',
        required: false,
        include: true
    }
];

let matrixRows = [
    {
        uid: '',
        text: Lang.trans('Row 1'),
    },
    {
        uid: '',
        text: Lang.trans('Row 2'),
    },
    {
        uid: '',
        text: Lang.trans('Row 3'),
    },
];

let matrixCols = [
    {
        uid: '',
        text: Lang.trans('Column 1'),
    },
    {
        uid: '',
        text: Lang.trans('Column 2'),
    },
    {
        uid: '',
        text: Lang.trans('Column 3'),
    },
];

let rootElements = [
    {
        uid: '',
        type: 'text',
        title: Lang.trans('Single text box'),
        className: 'fa-font',
        hide: false,
        config: {
            title: Lang.trans('Single text box')
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
        title: Lang.trans('Comment box'),
        className: 'fa-comments',
        hide: false,
        config: {
            title: Lang.trans('Comment box')
        },
        answer: ''
    },
    {
        uid: '',
        type: 'dropdown',
        title: Lang.trans('dropdown'),
        className: 'fa fa-caret-down',
        hide: false,
        config: {
            title: 'Dropdown',
            list: [  Lang.trans('Option 1'), Lang.trans('Option 2')],
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
        title: Lang.trans('Multiple textbooks'),
        className: 'fa-align-left',
        hide: false,
        config: {
            title: Lang.trans('Multiple textbooks'),
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
        title: Lang.trans('Multiple choice'),
        className: 'fa-check-square',
        hide: false,
        config: {
            title: Lang.trans('Multiple choice'),
            list: [ Lang.trans('Option 1'), Lang.trans('Option 2')],
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
        title: Lang.trans('Slider'),
        className: 'fa-sliders',
        hide: false,
        config: {
            title: Lang.trans('Slider'),
            zero: Lang.trans('Bad'),
            half: 'Regular',
            full: Lang.trans('Good')
        },
        answer: 0
    },
      {
        uid: '',
        type: 'image',
        title: Lang.trans('Image'),
        className: 'fa-image',
        hide: false,
        config: {
            title: Lang.trans('Image')
        },
        answer: ''
    },
    {
        uid: '',
        type: 'contact-information',
        title: Lang.trans('Contact Information'),
        className: 'fa-info',
        hide: false,
        config: {
            title: Lang.trans('Contact Information'),
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
        title: Lang.trans('Matrix'),
        className: 'fa-th',
        hide: false,
        config: {
            title: Lang.trans('Matrix'),
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
        title: Lang.trans('Matrix Ranking Scale'),
        className: 'fa-th',
        hide: false,
        config: {
            title: Lang.trans('Matrix Ranking Scale'),
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
        title: Lang.trans('Star Rating'),
        className: 'fa fa-star',
        hide: false,
        config: {
            title: Lang.trans('Star Rating'),
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
            //options: ['1', '2', '3', '4', '5']
            list: rankingList
        },
        answer: [],
        onClone: () => {
            rankingList.forEach(option => {
                option.uid = uniqueString();
            });
        }
    }
];

export default rootElements;
