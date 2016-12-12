
$(document).ready(function () {
    $('#defaultForm')
            .bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    nombre: {
                        message: 'Nombre  invalido',
                        validators: {
                            notEmpty: {
                                message: 'Se require su nombre'
                            },
                            stringLength: {
                                min: 3,
                                max: 30,
                                message: 'Su nombre require como minimo 3 caracteres y maximo 30'
                            },
                            regexp: {
                                regexp: /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/,
                                message: 'Su nombre no puede contener numeros, simbolos o signos'
                            }
                        }
                    },
                    apellidos: {
                        message: 'apellidos invalido',
                        validators: {
                            notEmpty: {
                                message: 'Se require su o sus apellidos'
                            },
                            stringLength: {
                                min: 4,
                                max: 50,
                                message: 'Su o sus apellidos require como minimo 4 caracteres y maximo 50'
                            },
                            regexp: {
                                regexp: /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/,
                                message: 'Su o sus apellidos no puede contener numeros, simbolos o signos'
                            }
                        }
                    },
                    correo: {
                        validators: {
                            notEmpty: {
                                message: 'Se require correo electronico'
                            },
                            emailAddress: {
                                message: 'correo electronico invalido'
                            }
                        }
                    },
                    telefono: {
                        message: 'Telefono invalido',
                        validators: {
                            notEmpty: {
                                message: 'Se require su telefono'
                            },
                            stringLength: {
                                min: 10,
                                max: 10,
                                message: 'Su telefono require 10 numeros'
                            },
                            regexp: {
                                regexp: /^[0-9_\.]+$/,
                                message: 'Su nombre no puede contener numeros, simbolos o signos'
                            }
                        }
                    },
                    usuario: {
                        message: 'Nombre de Usuario invalido',
                        validators: {
                            notEmpty: {
                                message: 'Se require nombre de Usuario'
                            },
                            stringLength: {
                                min: 3,
                                max: 30,
                                message: 'El usuario require como minimo 3 caracteres y maximo 30'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_\.]+$/,
                                message: 'El usuario no puede ser creado con simbolos ni signos'
                            }
                        }
                    },
                    contrasena: {
                        validators: {
                            notEmpty: {
                                message: 'Se require contrase&ntilde;a'
                            },
                            
                            stringLength: {
                                min: 6,
                                max: 30,
                                message: 'La contrase&ntilde;a require como minimo 6 caracteres y maximo 30'
                            },
                        }
                    },
                    confirmarcontrasena: {
                        validators: {
                            notEmpty: {
                                message: 'Confirmar contrase&ntilde;a'
                            },
                            identical: {
                                field: 'contrasena',
                                message: 'La contrase&ntilde;a no es igual'
                            }
                        }
                    },
                }
            });
});