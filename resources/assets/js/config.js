let baseUrl = ''
if (process.env.NODE_ENV === 'production') {
   baseUrl = 'http://66.198.240.13/~survenia/app/public/'
}else {
   baseUrl = 'http://localhost:8000/'
}
export const apiHost = baseUrl