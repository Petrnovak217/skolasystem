
<form class="add-student-form" method ="POST">
               <div class="input-field">
                <label for="first_name">jméno:</label>
                    <input 
                        type="text" 
                        name="first_name" 
                        value="<?=htmlspecialchars($first_name)?>" 
                        required>
               </div>

               <div class="input-field">
                <label for="second_name">přímení:</label>
                    <input 
                        type="text" 
                        name="second_name" 
                        value="<?=htmlspecialchars($second_name)?>" 
                        required>
                        <br>
               </div>

               <div class="input-field">  
                    <label for="age">věk:</label>
                    <input   
                        type="number"    
                        name="age"     
                        value="<?=htmlspecialchars($age )?>"     
                        required>   
                        <br>
               </div>
                <div class="input-field">
                    <label for="life">Dodatečné informace:</label>
                    <textarea name="life"> <?=htmlspecialchars($life)?></textarea><br>
                </div>
                <div class="input-field">
                    <label for="college">College</label>
                    <input   
                        type="text"    
                        name="college"     
                        value="<?=htmlspecialchars($college)?>"     
                        required>   
                        <br>
                </div>
               
               <!--  <div class="input-field">
                    <label for="college">Vyber kolej:</label>
                    <select name="college" id="college">
                        <option value="1">Horní Jihlava</option>
                        <option value="2">Vila</option>
                        <option value="3">Dolní Jihlava</option>
                        <option value="4">Kněžický zámeček</option>
                    </select>
                </div> -->

                <input type="submit" value="Odeslat">
            </form>