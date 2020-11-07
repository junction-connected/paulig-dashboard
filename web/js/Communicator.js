const MSG_ERR_SZERVEROLDAL_KEZELT = 'Szerveroldali hiba történt. Kérjük próbálja meg újra, vagy vegye fel velünk a kapcsolatot.';
const MSG_ERR_SZERVEROLDAL_KEZELETLEN = 'A folyamat végrehajtása közben hiba lépett fel. Kérjük próbálja meg újra, vagy vegye fel velünk a kapcsolatot.';
const MSG_ERR_IDOTULLEPES = 'A kapcsolat időtúllépés miatt megszakadt. Elképzelhető, hogy a problémát átmeneti internet szakadás, vagy túlterheltség okozza. <br><br>A folyamatot újra megpróbálhatja végrehajtani, de ha többszöri próbálkozás ellenére sem sikerül, akkor lépjen kapcsolatba velünk.';
const MSG_ERR_CSOMAGFAIL = 'A kommunikációs csomag formátuma nem megfelelő.';

hasMessage = false;

/**
 *
 */
class Communicator {
    /**
     * @param relativeUrl
     * @param data
     * @param successFunction
     */
    static post(relativeUrl,data,successFunction) {
        $.ajax({
            url: rootPath + relativeUrl,
            method: 'POST',
            timeout: 10000,
            data: data
        }).done(function(json){
            let success = true;
            let dataObj = {};

            try {
                dataObj = Communicator.getObjFromJson(json);
            } catch (error) {
                success = false;
                Communicator.createBootbox('Kommunikációs probléma', error.message, 'wrong-format');
            }
            if (success === true) {
                successFunction(dataObj);
            }
        }).fail(function(jqXHR, textStatus, errorThrown){
            let message = textStatus === 'timeout' ? MSG_ERR_IDOTULLEPES : MSG_ERR_SZERVEROLDAL_KEZELETLEN;
            Communicator.createBootbox('Kommunikációs probléma',message,'fail');
        });
    }


    /**
     * @param json
     * @returns {*}
     */
    static getObjFromJson(json){
        let communicationObj = JSON.parse(json);
        if (!communicationObj.hasOwnProperty('success') || !communicationObj.hasOwnProperty('data')) {
            throw Error(MSG_ERR_CSOMAGFAIL);
        }
        if (communicationObj.success !== 'true') {
            throw Error(MSG_ERR_SZERVEROLDAL_KEZELT);
        }
        return communicationObj.data;
    }


    /**
     * @param title
     * @param message
     * @param bootboxId
     */
    static createBootbox(title,message,bootboxId){
        if (!hasMessage) {
            let failAlert = bootbox.alert({
                title: title,
                message: message,
                callback: function(){
                    hasMessage = false;
                    location.reload();
                }
            });
            failAlert.on("shown.bs.modal", function() {
                failAlert.attr("id", "communication-" + bootboxId + "-alert");
            });
            hasMessage = true;
        }
    }
}
