
      <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2></h2>
                        <a class="close" href="{{route('doctors.index')}}">&times;</a>
                        <div class="content">
                            eDoc Web App<br>
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">View Details.</p><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Name: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    {{$user->fname . ' '. $user->lname}}<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Email" class="form-label">Email: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                {{$user->email}}<br><br>
                                </td>
                            </tr>
                            {{-- <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">NIC: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                {{$user->id}}<br><br>
                                </td>
                            </tr> --}}
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="phone" class="form-label">Telephone: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                {{$user->phone}}<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="tele" class="form-label">Address: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                {{$user->address}}<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Tele" class="form-label">Date of Birth: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                {{$user->date_of_birth}}<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="spec" class="form-label">Specialties: </label>
                                </td>
                            </tr>
                            <tr>

                            <td class="label-td" colspan="2">
                                {{$user->doctor->speciality->name}}<br><br>
                            </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="{{route('doctors.index')}}"><input type="button" value="OK" class="login-btn btn-primary-soft btn" ></a>
                                </td>
                            </tr>
                        </table>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>