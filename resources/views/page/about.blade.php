@extends('layouts.app')

@section('content')
    @component('layouts.component.title')
        {{ __('Sobre') }}
    @endcomponent

    <div class="wrapper">
        <div>{{('Biblioteca online está utilizando a framework Laravel.')}}</div>
    </div>
    <br>
    <div class="wrapper">
        <div>
            {{('A biblioteca física disponibiliza dos seguintes serviços :')}} <br>
            <ul>
                <li>{{__('Consulta de presença (jornais, revistas, livros…)')}}</li>
                <li>{{('Serviço de empréstimo domiciliário')}}</li>
                <li>{{('Serviço de apoio à informação')}}</li>
                <li>{{('Acesso a pc’s de trabalho e acesso à Internet')}}</li>
                <li>{{('Visionamento de filmes e televisão por cabo')}}</li>
                <li>{{('Audição de música')}}</li>
                <li>{{('Serviço de fotocópias (documentos da BMCL) e impressões')}}</li>
                <li>{{('Acesso ao catálogo informatizado')}}</li>
                <li>{{('Atividades e dinamização cultural')}}</li>
                <li>{{('Ateliers')}}</li>
                <li>{{('Sessões de cinema')}}</li>
                <li>{{('Hora do estudo')}}</li>
                <li>{{('Hora do conto')}}</li>
                <li>{{('Troca de livros')}}</li>
                <li>{{('Encontros com escritores')}}</li>
                <li>{{('Outros')}}</li>
            </ul>
        </div>
        <div>
            {{('Horário de funcionamento :')}} <br>
            <table cellspacing="1" cellpadding="3" border="1">
                <tbody>
                <tr height="21">
                    <td colspan="3" style="width: 202px;" height="21" align="center">
                        <h1>Período letivo</h1>
                    </td>
                </tr>
                <tr height="22">
                    <td style="width: 254px;" height="22" align="center"><span style="color: #000000; font-family: Arial; font-size: medium;" color="#000000" face="Arial" size="3"><strong>Dias</strong></span></td>
                    <td style="width: 221px;" align="center"><span style="color: #000000; font-family: Arial; font-size: medium;" color="#000000" face="Arial" size="3"><strong>Abertura</strong></span></td>
                    <td style="width: 202px;" height="22" align="center"><strong><span style="color: #000000; font-family: Calibri; font-size: medium;" color="#000000" face="Calibri" size="3">Encerramento</span></strong></td>
                </tr>
                <tr height="40">
                    <td style="width: 254px;"><span style="color: #000000; font-family: Arial; font-size: medium;" color="#000000" face="Arial" size="3">Segunda a Sexta-Feira</span></td>
                    <td style="width: 221px; text-align: center;"><span style="color: #000000; font-family: Arial; font-size: medium;" color="#000000" face="Arial" size="3">9:00</span></td>
                    <td style="width: 202px; text-align: center;"><span style="color: #000000; font-family: Arial; font-size: medium;" color="#000000" face="Arial" size="3">20:00</span></td>
                </tr>
                <tr height="33">
                    <td style="width: 254px;"><span style="color: #000000; font-family: Arial; font-size: medium;" color="#000000" face="Arial" size="3">Sábado <br></span></td>
                    <td style="width: 221px; text-align: center;"><span style="color: #000000; font-family: Arial; font-size: medium;" color="#000000" face="Arial" size="3">9:00</span></td>
                    <td style="width: 202px; text-align: center;"><span style="color: #000000; font-family: Arial; font-size: medium;" color="#000000" face="Arial" size="3">13:45</span></td>
                </tr>
                <tr align="center">
                    <td colspan="3" style="width: 202px;">
                        <h1>Período de férias letivas</h1>
                    </td>
                </tr>
                <tr height="40">
                    <td style="width: 254px;" align="left">
                        <p align="center"><strong><span style="font-size: medium;" size="3"><span style="color: #000000;" color="#000000"><span style="font-family: Arial;" face="Arial">Dias </span></span></span></strong></p>
                    </td>
                    <td style="width: 221px;" align="left">
                        <p align="center"><strong><span style="font-size: medium;" size="3"><span style="color: #000000;" color="#000000"><span style="font-family: Arial;" face="Arial">Abertura </span></span></span></strong></p>
                    </td>
                    <td style="width: 202px; text-align: center;" align="left"><strong><span style="font-size: medium;" size="3"><span style="color: #000000;" color="#000000"><span style="font-family: Arial;" face="Arial">Encerramento</span></span></span></strong></td>
                </tr>
                <tr height="37">
                    <td style="width: 254px;"><span style="color: #000000; font-family: Arial; font-size: medium;" color="#000000" face="Arial" size="3">Segunda a Sexta- Feira</span></td>
                    <td style="width: 221px;">
                        <p style="text-align: center;"><span style="color: #000000; font-family: Arial; font-size: medium;" color="#000000" face="Arial" size="3">9:00</span></p>
                        <p style="text-align: center;"><span style="color: #000000; font-family: Arial; font-size: medium;" color="#000000" face="Arial" size="3">14:00</span></p>
                    </td>
                    <td style="width: 202px;">
                        <p style="text-align: center;"><span style="color: #000000; font-family: Arial; font-size: medium;" color="#000000" face="Arial" size="3">12:30</span></p>
                        <p style="text-align: center;"><span style="color: #000000; font-family: Arial; font-size: medium;" color="#000000" face="Arial" size="3">17:30</span></p>
                    </td>
                </tr>
                <tr height="77">
                    <td style="width: 254px;"><span style="color: #000000; font-family: Arial; font-size: medium;" color="#000000" face="Arial" size="3">Sábado, Domingo e Feriado</span></td>
                    <td style="width: 221px; text-align: center;"><span style="color: #000000; font-family: Arial; font-size: medium;" color="#000000" face="Arial" size="3">Encerrada</span></td>
                    <td style="width: 202px; text-align: center;"><span style="color: #000000; font-family: Arial; font-size: medium;" color="#000000" face="Arial" size="3">Encerrada</span></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br>
@endsection
